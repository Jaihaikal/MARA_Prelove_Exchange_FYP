<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faculty;
use Str;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faculties = [
            ['name' => 'Faculty of Computer Science', 'code' => 'FCS'],
            ['name' => 'Faculty of Business Management', 'code' => 'FBM'],
            ['name' => 'Faculty of Engineering', 'code' => 'FE'],
            ['name' => 'Faculty of Education', 'code' => 'FED'],
            ['name' => 'Faculty of Medicine', 'code' => 'FMED'],
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
