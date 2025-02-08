<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Fetch all parent categories
        $parentCategories = Category::where('is_parent', 1)->get();

        foreach ($parentCategories as $category) {
            // Create 5 brands for each parent category
            for ($i = 1; $i <= 5; $i++) {
                Brand::create([
                    'title' => 'Brand - ' . $category->title . ' ' . $i, // Brand name based on category
                    'slug' => Str::slug('Brand - ' . $category->title . ' ' . $i),
                    'status' => $faker->randomElement(['active', 'inactive']), // Random status
                    'category_id' => $category->id, // Link to the category
                ]);
            }
        }
    }
}
