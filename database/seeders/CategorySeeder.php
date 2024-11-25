<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Str;

class CategorySeeder extends Seeder
{

    // public function run()
    // {
    // $faker = \Faker\Factory::create();

    // // Create 5 parent categories
    // $parentIds = [];
    // for ($i = 0; $i < 5; $i++) {
    //     $parent = Category::create([
    //         'title' => $faker->word,
    //         'slug' => Str::slug($faker->unique()->word),
    //         'summary' => $faker->sentence,
    //         'photo' => $faker->imageUrl(200, 200, 'business'),
    //         'is_parent' => true,
    //         'parent_id' => null,
    //         'added_by' => $faker->optional()->numberBetween(1, 10), // Assuming there are 10 users
    //         'status' => $faker->randomElement(['active', 'inactive']),
    //     ]);

    //     $parentIds[] = $parent->id;
    // }

    // // Create 10 child categories with random parent IDs
    // for ($i = 0; $i < 10; $i++) {
    //     Category::create([
    //         'title' => $faker->word,
    //         'slug' => Str::slug($faker->unique()->word),
    //         'summary' => $faker->sentence,
    //         'is_parent' => false,
    //         'parent_id' => $faker->randomElement($parentIds),
    //         'added_by' => $faker->optional()->numberBetween(1, 10),
    //         'status' => $faker->randomElement(['active', 'inactive']),
    //     ]);
    // }
    // }
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

        foreach ($parentCategories as $parent) {
            for ($j = 1; $j <= 2; $j++) {
                Category::create([
                    'title' => $parent->title . ' - Subcategory ' . $j,
                    'slug' => Str::slug($parent->title . ' - Subcategory ' . $j),
                    'summary' => 'This is the summary for ' . $parent->title . ' - Subcategory ' . $j,
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
