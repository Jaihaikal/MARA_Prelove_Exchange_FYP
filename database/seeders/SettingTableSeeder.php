<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
        'description'=>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis iste natus error sit voluptatem Excepteu

                            sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspi deserunt mollit anim id est laborum. sed ut perspi.",
            'short_des'=>"Developed by UiTM, MPeX is designed to provide an exceptional platform for the UiTM student community to buy, sell, and exchange preloved items, fostering sustainability and convenience",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"UiTM Shah ALAM",
            'email'=>"mpex@gmail.com",
            'phone'=>"+60-17 269 1270",
        );
        DB::table('settings')->insert($data);
    }
    
}
