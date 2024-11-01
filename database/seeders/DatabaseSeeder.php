<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         $this->call([
            SettingTableSeeder::class,
            FacultySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            // ProductImageSeeder::class,
            // OrderSeeder::class,
            // OrderItemSeeder::class,
            // ReviewSeeder::class,

         ]);
    }
}
