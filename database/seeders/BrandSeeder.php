<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    // public function run()
    // {
    //     // Define sample brands
    //     $brands = [
    //         ['title' => 'Apple', 'status' => 'active'],
    //         ['title' => 'Samsung', 'status' => 'active'],
    //         ['title' => 'Sony', 'status' => 'active'],
    //         ['title' => 'Nike', 'status' => 'active'],
    //         ['title' => 'Adidas', 'status' => 'active'],
    //         ['title' => 'Microsoft', 'status' => 'inactive'],
    //     ];

    //     // Create brand records
    //     foreach ($brands as $data) {
    //         Brand::create([
    //             'title' => $data['title'],
    //             'slug' => Str::slug($data['title']),
    //             'status' => $data['status'],
    //         ]);
    //     }
    // }

    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Fetch all categories
        $categories = Category::all();

        foreach ($categories as $category) {
            // Create 5 brands for each category
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
