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
            CategorySeeder::class,
            UserSeeder::class,

         ]);
    }
}
