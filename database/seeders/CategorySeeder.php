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
        $faker = \Faker\Factory::create();
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
                'photo' => $faker->imageUrl(200, 200, 'business'),
                'status' => 'active',
                'is_parent' => true,
                'parent_id' => null,
                'added_by' => 1,
            ]);
        }

        $subCategoriesData = [
            'Electronic' => ['Phone', 'Computer', 'Gadget'],
            'Clothing' => ['Men', 'Women'],
            'Study Material' => ['Book', 'Stationary']
        ];

        foreach ($parentCategories as $parent) {
            foreach ($subCategoriesData[$parent->title] as $subCategoryTitle) {
                Category::create([
                    'title' => $subCategoryTitle,
                    'slug' => Str::slug($subCategoryTitle),
                    'summary' => 'This is the summary for ' . $subCategoryTitle,
                    'photo' => $faker->imageUrl(200, 200, 'business'),
                    'status' => 'active',
                    'is_parent' => false,
                    'parent_id' => $parent->id,
                    'added_by' => 1,
                ]);
            }
        }
    }
}
