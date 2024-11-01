<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Str;
use App\User as AppUser;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Retrieve categories and brands
        $electronicsCategory = Category::where('title', 'Electronic')->first();
        $clothingCategory = Category::where('title', 'Clothing')->first();
        $studyMaterialCategory = Category::where('title', 'Study Material')->first();

        $appleBrand = Brand::where('title', 'Apple')->first();
        $samsungBrand = Brand::where('title', 'Samsung')->first();
        $nikeBrand = Brand::where('title', 'Nike')->first();

        // Assuming you have some users in your database, e.g., user_id 1
        $userId = AppUser::first()->id;

        // Define sample products
        $products = [
            [
                'title' => 'iPhone 14',
                'summary' => 'Latest iPhone model with advanced features',
                'description' => 'The new iPhone 14 comes with cutting-edge technology and improved battery life.',
                'price' => 999.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null, // assuming no child category for simplicity
                'brand_id' => $appleBrand->id,
                'discount' => 10, // 10% discount
                'status' => 'active',
                'photo' => 'images/products/iphone_14.jpg',
                'size' => '6.1 inches',
                'stock' => 50,
                'is_featured' => true,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Samsung Galaxy S23',
                'summary' => 'High-performance smartphone by Samsung',
                'description' => 'Samsung Galaxy S23 offers a powerful camera and smooth performance.',
                'price' => 899.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null,
                'brand_id' => $samsungBrand->id,
                'discount' => 15,
                'status' => 'active',
                'photo' => 'images/products/galaxy_s23.jpg',
                'size' => '6.5 inches',
                'stock' => 70,
                'is_featured' => true,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'Nike Air Max',
                'summary' => 'Popular Nike shoes with great comfort',
                'description' => 'The Nike Air Max is designed for ultimate comfort and style.',
                'price' => 150.00,
                'cat_id' => $clothingCategory->id,
                'child_cat_id' => null,
                'brand_id' => $nikeBrand->id,
                'discount' => 5,
                'status' => 'active',
                'photo' => 'images/products/nike_air_max.jpg',
                'size' => '10 US',
                'stock' => 30,
                'is_featured' => false,
                'condition' => 'new',
                'user_id' => $userId
            ],
            [
                'title' => 'MacBook Pro',
                'summary' => 'Powerful laptop for professionals',
                'description' => 'The MacBook Pro is a high-performance laptop designed for productivity.',
                'price' => 1299.99,
                'cat_id' => $electronicsCategory->id,
                'child_cat_id' => null,
                'brand_id' => $appleBrand->id,
                'discount' => 20,
                'status' => 'active',
                'photo' => 'images/products/macbook_pro.jpg',
                'size' => '13 inches',
                'stock' => 15,
                'is_featured' => true,
                'condition' => 'used',
                'user_id' => $userId
            ],
            [
                'title' => 'Data Science Handbook',
                'summary' => 'Comprehensive guide on data science',
                'description' => 'A thorough book covering data science basics, algorithms, and applications.',
                'price' => 45.00,
                'cat_id' => $studyMaterialCategory->id,
                'child_cat_id' => null,
                'brand_id' => null, // No brand for books
                'discount' => 0,
                'status' => 'active',
                'photo' => 'images/products/data_science_handbook.jpg',
                'size' => 'N/A',
                'stock' => 100,
                'is_featured' => false,
                'condition' => 'used',
                'user_id' => $userId
            ]
        ];

        // Create product records
        foreach ($products as $data) {
            Product::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'summary' => $data['summary'],
                'description' => $data['description'],
                'price' => $data['price'],
                'cat_id' => $data['cat_id'],
                'child_cat_id' => $data['child_cat_id'],
                'brand_id' => $data['brand_id'],
                'discount' => $data['discount'],
                'status' => $data['status'],
                'photo' => $data['photo'],
                'size' => $data['size'],
                'stock' => $data['stock'],
                'is_featured' => $data['is_featured'],
                'condition' => $data['condition'],
                'user_id' => $data['user_id']
            ]);
        }
    }
}
