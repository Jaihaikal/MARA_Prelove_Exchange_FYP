<?php

namespace App\Services;
use App\Models\UserProductInteraction;

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
    public function getRecommendations($userId, $matrix, $similarities)
    {
        $recommendations = [];

        // Get the target user's existing products
        $userProducts = $matrix[$userId] ?? [];

        // Find similar users
        $similarUsers = $similarities[$userId] ?? [];

        // Sort similar users by similarity score (descending)
        arsort($similarUsers);

        // Generate recommendations
        foreach ($similarUsers as $similarUserId => $similarityScore) {
            if ($similarityScore > 0) {
                // Get products of the similar user
                $similarUserProducts = $matrix[$similarUserId] ?? [];

                foreach ($similarUserProducts as $productId => $weight) {
                    // Exclude products the target user has already interacted with
                    if (!isset($userProducts[$productId])) {
                        // Add to recommendations with a score based on similarity and weight
                        $recommendations[$productId] = ($recommendations[$productId] ?? 0) + ($similarityScore * $weight);
                    }
                }
            }
        }

        // Sort recommendations by score (descending)
        arsort($recommendations);

        return array_keys($recommendations); // Return product IDs
    }
}



