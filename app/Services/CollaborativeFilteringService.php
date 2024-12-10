<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CollaborativeFilteringService
{
    public function getRecommendations($userId)
    {
        if (!$userId) {
            return []; // Return an empty array if the user is not logged in
        }

        // Step 1: Fetch the products the user recently interacted with
        $recentlyInteractedProducts = DB::table('user_product_interactions')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->pluck('product_id');

        if ($recentlyInteractedProducts->isEmpty()) {
            return []; // No recommendations if the user has no recent interactions
        }

        // Step 2: Get the categories of these products
        $relatedCategories = DB::table('products')
            ->whereIn('id', $recentlyInteractedProducts)
            ->pluck('cat_id');

        if ($relatedCategories->isEmpty()) {
            return []; // No recommendations if the products have no categories
        }

        // Step 3: Fetch products from the same categories that the user has not interacted with recently
        $recommendedProducts = DB::table('products')
            ->whereIn('cat_id', $relatedCategories)
            ->whereNotIn('id', $recentlyInteractedProducts) // Exclude products the user already interacted with
            ->where('status', 'active') // Ensure the product is active
            ->orderBy('created_at', 'DESC') // Prioritize recently added products
            ->limit(8)
            ->pluck('id');

        return $recommendedProducts;
    }
// public function getRecommendations($userId)
//     {
//         // Step 1: Get current user interactions
//         $currentUserInteractions = DB::table('user_product_interactions')
//             ->where('user_id', $userId)
//             ->pluck('weight', 'product_id');

//         if ($currentUserInteractions->isEmpty()) {
//             return []; // No recommendations if user has no data
//         }

//         // Step 2: Find similar users
//         $similarUsers = DB::table('user_product_interactions')
//             ->whereIn('product_id', $currentUserInteractions->keys())
//             ->where('user_id', '!=', $userId)
//             ->select('user_id', DB::raw('COUNT(*) as common_products'))
//             ->groupBy('user_id')
//             ->orderByDesc('common_products')
//             ->limit(10)
//             ->pluck('user_id');

//         if ($similarUsers->isEmpty()) {
//             return []; // No recommendations if no similar users
//         }

//         // Step 3: Recommend products based on similar users' interactions
//         $recommendedProducts = DB::table('user_product_interactions')
//             ->whereIn('user_id', $similarUsers)
//             ->whereNotIn('product_id', $currentUserInteractions->keys())
//             ->select('product_id', DB::raw('AVG(weight) as avg_weight'))
//             ->groupBy('product_id')
//             ->orderByDesc('avg_weight')
//             ->limit(10)
//             ->pluck('product_id');

//         return $recommendedProducts;
//     }
}



