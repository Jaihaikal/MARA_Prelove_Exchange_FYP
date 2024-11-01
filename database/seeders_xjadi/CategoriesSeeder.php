<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Electronics',
                'slug' => Str::slug('Electronics'),
                'summary' => 'Electronic items and gadgets',
                'photo' => 'electronics.jpg',
                'status' => 'active',
                'is_parent' => true,
                'parent_id' => null, // No parent because it's a top-level category
        
            ],
            [
                'title' => 'Mobile Phones',
                'slug' => Str::slug('Mobile Phones'),
                'summary' => 'Smartphones and mobile devices',
                'photo' => 'mobiles.jpg',
                'status' => 'active',
                'is_parent' => false,
                'parent_id' => 1, // Parent is 'Electronics'
                // 'added_by' => 1, // Assuming user ID 1 is the admin
            ],
            // [
            //     'title' => 'Fashion',
            //     'slug' => Str::slug('Fashion'),
            //     'summary' => 'Clothing, accessories, and fashion items',
            //     'photo' => 'fashion.jpg',
            //     'status' => 'active',
            //     'is_parent' => true,
            //     'parent_id' => null, // No parent because it's a top-level category
            //     'added_by' => 1, // Assuming user ID 1 is the admin
            // ],
            // [
            //     'title' => 'Men’s Clothing',
            //     'slug' => Str::slug('Men’s Clothing'),
            //     'summary' => 'Clothing for men',
            //     'photo' => 'mens-clothing.jpg',
            //     'status' => 'active',
            //     'is_parent' => false,
            //     'parent_id' => 3, // Parent is 'Fashion'
            //     'added_by' => 1, // Assuming user ID 1 is the admin
            // ],
            // [
            //     'title' => 'Women’s Clothing',
            //     'slug' => Str::slug('Women’s Clothing'),
            //     'summary' => 'Clothing for women',
            //     'photo' => 'womens-clothing.jpg',
            //     'status' => 'active',
            //     'is_parent' => false,
            //     'parent_id' => 3, // Parent is 'Fashion'
            //     'added_by' => 1, // Assuming user ID 1 is the admin
            // ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
