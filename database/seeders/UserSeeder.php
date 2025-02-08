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
                    'phone'=>'0133329891',
                    'student_id'=>'2023000001',
                    'faculty_id' => '1',
                    'role' => 'admin',
                    'status' => 'active'
                ),
            
                array(
                    'name'=>'Haikal Zahri',
                    'email'=>'jai@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0175546798',
                    'student_id'=>'2023000002',
                    'faculty_id' => '2',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Ahmad Nazif',
                    'email'=>'Jep@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0164425645',
                    'student_id'=>'2023000021',
                    'faculty_id' => '3',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Hafidz',
                    'email'=>'deze@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0172648976',
                    'student_id'=>'2023001201',
                    'faculty_id' => '4',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Syahmi',
                    'email'=>'apai@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0163349867',
                    'student_id'=>'2023230001',
                    'faculty_id' => '5',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Kahirul Azrai',
                    'email'=>'arai@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0195542345',
                    'student_id'=>'2023765234',
                    'faculty_id' => '6',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Syaza',
                    'email'=>'syaza@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0134457689',
                    'student_id'=>'2023045001',
                    'faculty_id' => '7',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Farah Afiqah',
                    'email'=>'farah@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'0133329823',
                    'student_id'=>'2023890001',
                    'faculty_id' => '8',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Farisha Maisarah',
                    'email'=>'far@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'013987367',
                    'student_id'=>'2023120001',
                    'faculty_id' => '9',
                    'role'=>'user',
                    'status'=>'active'
                ),
                array(
                    'name'=>'Test User ',
                    'email'=>'user@gmail.com',
                    'password'=>Hash::make('1111'),
                    'phone'=>'013987377',
                    'student_id'=>'2023122001',
                    'faculty_id' => '10',
                    'role'=>'user',
                    'status'=>'active'
                )
            );

            DB::table('users')->insert($data);
        

    }
}
