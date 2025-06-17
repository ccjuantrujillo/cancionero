<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('lectures')->insert([
            'fecha' => '2025-06-16', 
            'tema'  => 'La Santisima Trinidad'
        ]);

    }
}
