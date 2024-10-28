<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Str;

class FacultySeeder extends Seeder
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
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
