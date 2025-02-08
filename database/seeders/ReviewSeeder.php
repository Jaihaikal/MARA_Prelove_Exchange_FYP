<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = DB::table('products')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        $reviews = [];
        for ($i = 1; $i <= 20; $i++) {
            $reviews[] = [
                'product_id' => $productIds[array_rand($productIds)],
                'user_id' => $userIds[array_rand($userIds)],
                'rate' => rand(1, 5),
                'review' => 'Sample review comment ' . $i,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('product_reviews')->insert($reviews);
    }
}
