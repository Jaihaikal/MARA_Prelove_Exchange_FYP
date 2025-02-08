<?php

namespace App\Services;
use App\Models\UserProductInteraction;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CollaborativeFilteringService
{
    // Step 1: Build the user-product matrix
    public function getUserProductMatrix()
    {
        $interactions = UserProductInteraction::all();

        // Create a matrix [user_id][product_id] = weight
        $matrix = [];
        foreach ($interactions as $interaction) {
            $matrix[$interaction->user_id][$interaction->product_id] = $interaction->weight;
        }

        return $matrix;
    }

    // Step 2: Calculate similarity between products
    public function calculateProductSimilarity($productA, $productB)
    {
        $categorySimilarity = $productA->cat_id == $productB->cat_id ? 1 : 0;
        $priceDifference = abs($productA->price - $productB->price);
        $priceSimilarity = 1 / (1 + $priceDifference);

        return ($categorySimilarity + $priceSimilarity) / 2;
    }

    // Step 2: Calculate similarity between users
    public function calculateUserSimilarity($matrix)
    {
        $similarities = [];

        $userIds = array_keys($matrix);

        foreach ($userIds as $userA) {
            foreach ($userIds as $userB) {
                if ($userA !== $userB) {
                    $similarities[$userA][$userB] = $this->cosineSimilarity(
                        $matrix[$userA] ?? [],
                        $matrix[$userB] ?? []
                    );
                }
            }
        }

        return $similarities;
    }

    // Cosine similarity function
    private function cosineSimilarity($vectorA, $vectorB)
    {
        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        // Calculate dot product and magnitudes
        $allKeys = array_unique(array_merge(array_keys($vectorA), array_keys($vectorB)));
        foreach ($allKeys as $key) {
            $valA = $vectorA[$key] ?? 0;
            $valB = $vectorB[$key] ?? 0;

            $dotProduct += $valA * $valB;
            $magnitudeA += $valA ** 2;
            $magnitudeB += $valB ** 2;
        }

        // Avoid division by zero
        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0;
        }

        return $dotProduct / (sqrt($magnitudeA) * sqrt($magnitudeB));
    }

    // Step 3: Generate recommendations
    public function getRecommendations($userId, $matrix)
{
    $recommendations = [];

    // Get the target user's existing products
    $userProducts = $matrix[$userId] ?? [];

    // Fetch details of products the user has interacted with
    $userProductIds = array_keys($userProducts);
    $userProductDetails = Product::whereIn('id', $userProductIds)->get();

    // Fetch all products
    $allProducts = Product::all();

    // Calculate similarity and generate recommendations
    foreach ($allProducts as $product) {
        if (!isset($userProducts[$product->id])) {
            $similarityScore = 0;
            foreach ($userProductDetails as $userProduct) {
                $similarityScore += $this->calculateProductSimilarity($userProduct, $product);
            }
            if (count($userProductDetails) > 0) {
                $recommendations[$product->id] = $similarityScore / count($userProductDetails);
            }
        }
    }

    // Sort recommendations by score (descending)
    arsort($recommendations);

    // Limit the number of recommendations to 8
    return array_slice(array_keys($recommendations), 0, 8);
}
}



