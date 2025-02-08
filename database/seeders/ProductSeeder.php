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

        $productsData = [
            'Phone' => ['Iphone XS', 'Samsung S9'],
            'Computer' => ['MSI GF63', 'Asus ROG TUF'],
            'Gadget' => ['Earbud Samsung', 'Headphone Redmi'],
            'Men' => ['Denim Jacket', 'North Face Hoodie'],
            'Women' => ['ZARA Blouser', 'Oversize Jeans'],
            'Book' => ['Basic Accounting', 'C++ for Beginner'],
            'Stationary' => ['Architecture Drawing Tools', 'Calculator']
        ];

        // Fetch all parent categories
        $parentCategories = Category::where('is_parent', true)->get();

        foreach ($parentCategories as $parent) {
            // Fetch subcategories for each parent
            $subCategories = Category::where('parent_id', $parent->id)->get();

            foreach ($subCategories as $subCategory) {
                // Create specific products for each subcategory
                foreach ($productsData[$subCategory->title] as $productTitle) {
                    $photos = [];
                    for ($j = 1; $j <= 3; $j++) {
                        // Using Lorem Picsum or Placeholder Images
                        $photos[] = $faker->imageUrl(300, 300, 'product', true, 'Product-' . $j);
                    }
                    Product::create([
                        'title' => $productTitle,
                        'slug' => Str::slug($productTitle),
                        'summary' => $faker->sentence(),
                        'description' => $faker->paragraph(),
                        'cat_id' => $parent->id, // Parent category ID
                        'child_cat_id' => $subCategory->id, // Subcategory ID
                        'price' => $faker->numberBetween(50, 1000), // Random price between 50 and 1000
                        'brand_id' => $faker->numberBetween(1, 10), // Assuming you have 10 brands
                        'discount' => $faker->numberBetween(0, 50), // Random discount between 0 and 50
                        'status' => 'active',
                        'photo' => '/storage/photos/1/Clothing.png', // Store as comma-separated string
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
