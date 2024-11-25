<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'title' => $faker->words(3, true),
                'slug' => Str::slug($faker->unique()->words(3, true)),
                'summary' => $faker->sentence,
                'description' => $faker->paragraph,
                'photo' => $faker->imageUrl(400, 400, 'product'),
                'stock' => $faker->numberBetween(1, 10),
                'condition' => $faker->randomElement(['default', 'new', 'used']),
                'status' => $faker->randomElement(['active']),
                'price' => $faker->randomFloat(2, 10, 1000), // Prices between $10 and $1000
                'discount' => $faker->optional()->randomFloat(2, 0, 50), // Discount between 0% and 50%
                'is_featured' => true, // 20% chance of being featured
                'user_id' => $faker->numberBetween(1, 10), // Assuming user IDs from 1 to 10
                'cat_id' => $faker->numberBetween(1, 3), // Assuming category IDs from 1 to 10
                'child_cat_id' => $faker->numberBetween(4, 9), // Assuming sub-category IDs from 11 to 20
                'brand_id' => $faker->optional()->numberBetween(1, 5), // Assuming brand IDs from 1 to 5
            ]);
        }
    }
}
