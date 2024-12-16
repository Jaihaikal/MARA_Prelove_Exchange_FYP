<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
{
    $faker = \Faker\Factory::create();
    
    // Fetch all parent categories
    $parentCategories = Category::where('is_parent', true)->get();

    foreach ($parentCategories as $parent) {
        // Fetch subcategories for each parent
        $subCategories = Category::where('parent_id', $parent->id)->get();

        foreach ($subCategories as $subCategory) {
            // Create 20 products for each subcategory
            for ($i = 1; $i <= 20; $i++) {
                Product::create([
                    'title' => 'Product - ' . $subCategory->title . ' ' . $i,
                    'slug' => Str::slug('Product - ' . $subCategory->title . ' ' . $i),
                    'summary' => $faker->sentence(),
                    'description' => $faker->paragraph(),
                    'cat_id' => $parent->id, // Parent category ID
                    'child_cat_id' => $subCategory->id, // Subcategory ID
                    'price' => $faker->numberBetween(50, 1000), // Random price between 50 and 1000
                    'brand_id' => $faker->numberBetween(1, 10), // Assuming you have 10 brands
                    'discount' => $faker->numberBetween(0, 50), // Random discount between 0 and 50
                    'status' => 'active',
                    'photo' => $faker->imageUrl(300, 300, 'product'), // Placeholder product image
                    'stock' => $faker->numberBetween(1, 5), // Random stock between 1 and 5
                    'is_featured' => true, // Always featured
                    'condition' => $faker->randomElement(['new', 'used']), // Random condition
                    'user_id' => $faker->numberBetween(1, 10),
                ]);
            }
        }
    }
}

}
