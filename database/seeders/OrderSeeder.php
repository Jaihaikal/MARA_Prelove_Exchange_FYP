<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\User;
use Str;
use App\Models\Product;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 orders
        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'order_number' => Str::random(10),
                'sub_total' => rand(100, 1000),
                'quantity' => rand(1, 10),
                'status' => 'new',
                'total_amount' => rand(110, 1050),
                'first_name' => Str::random(5),
                'last_name' => Str::random(5),
                'post_code' => Str::random(5),
                'address1' => Str::random(10),
                'address2' => Str::random(10),
                'phone' => Str::random(10),
                'email' => Str::random(5) . '@example.com',
                'payment_method' => 'cod',
                'payment_status' => 'unpaid',
                'coupon' => null,
                'product_id' => Product::inRandomOrder()->first()->id,
            ]);
        }
    }
}
