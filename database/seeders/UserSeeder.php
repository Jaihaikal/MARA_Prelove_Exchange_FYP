<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'user',
                'status'=>'active'
            ),
            array(
                'name'=>'Jai',
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
            ),
        );

        DB::table('users')->insert($data);
    }
}
