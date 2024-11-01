<?php

use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            // SettingTableSeeder::class,
            // CouponSeeder::class,
            CategoriesSeeder::class,
            UserSeeder::class,

         ]);
    }
}
