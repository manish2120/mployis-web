<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EducationLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education_levels')->insert([
            ['id' => 1, 'education_level' => 'tenth_grade'],
            ['id' => 2, 'education_level' => 'twelfth_grade'],
            ['id' => 3, 'education_level' => 'higher_education'],
            ['id' => 4, 'education_level' => 'postgraduate'],
        ]);
    }
}
