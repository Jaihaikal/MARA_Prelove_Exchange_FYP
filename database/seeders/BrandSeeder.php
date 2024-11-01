<?php

namespace Database\Seeders;

use App\Models\Brand;
use Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        // Define sample brands
        $brands = [
            ['title' => 'Apple', 'status' => 'active'],
            ['title' => 'Samsung', 'status' => 'active'],
            ['title' => 'Sony', 'status' => 'active'],
            ['title' => 'Nike', 'status' => 'active'],
            ['title' => 'Adidas', 'status' => 'active'],
            ['title' => 'Microsoft', 'status' => 'inactive'],
        ];

        // Create brand records
        foreach ($brands as $data) {
            Brand::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'status' => $data['status'],
            ]);
        }
    }
}
