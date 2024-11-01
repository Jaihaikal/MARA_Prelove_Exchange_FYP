<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentCategoriesData = [
            ['title' => 'Electronic', 'summary' => 'Electronic devices and gadgets'],
            ['title' => 'Clothing', 'summary' => 'Apparel and accessories'],
            ['title' => 'Study Material', 'summary' => 'Books, stationery, and educational resources']
        ];

        $parentCategories = [];
        foreach ($parentCategoriesData as $data) {
            $parentCategories[] = Category::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'summary' => $data['summary'],
                'photo' => 'default_photo.jpg',
                'status' => 'active',
                'is_parent' => true,
                'parent_id' => null,
                'added_by' => 1,
            ]);
        }

        foreach ($parentCategories as $parent) {
            for ($j = 1; $j <= 2; $j++) {
                Category::create([
                    'title' => $parent->title . ' - Subcategory ' . $j,
                    'slug' => Str::slug($parent->title . ' - Subcategory ' . $j),
                    'summary' => 'This is the summary for ' . $parent->title . ' - Subcategory ' . $j,
                    'photo' => 'default_photo.jpg',
                    'status' => 'active',
                    'is_parent' => false,
                    'parent_id' => $parent->id,
                    'added_by' => 1,
                ]);
            }
        }
    }
}
