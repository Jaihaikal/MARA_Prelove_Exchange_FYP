<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $data = array(
                array(
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('1111'),
                    'role' => 'admin',
                    'status' => 'active'
                ),
            
                array(
                    'name'=>'Haikal Zahri',
                    'email'=>'user@gmail.com',
                    'password'=>Hash::make('1111'),
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Ahmad NazIF',
                    'email'=>'jai@gmail.com',
                    'password'=>Hash::make('1111'),
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Hamid',
                    'email'=>'hamid@gmail.com',
                    'password'=>Hash::make('1111'),
                    'role'=>'user',
                    'status'=>'active'
                )
            );

            DB::table('users')->insert($data);
        

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'student_id' => $faker->unique()->numberBetween(2023000000, 2023999999),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // default password
                'photo' => $faker->imageUrl(200, 200, 'people'),
                'phone' => $faker->phoneNumber,
                'role' => $faker->randomElement(['user']),
                'provider' => null,
                'provider_id' => null,
                'status' => $faker->randomElement(['active']),
                'remember_token' => Str::random(10),
                'faculty_id' => $faker->optional()->numberBetween(1, 10), // Assumes faculties table has IDs 1 to 10
                // 'campus_id' => $faker->optional()->numberBetween(1, 5), // Assumes campuses table has IDs 1 to 5
            ]);
    }
}
}
