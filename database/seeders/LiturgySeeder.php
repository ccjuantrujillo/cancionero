<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LiturgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('liturgies')->insert(['descripcion'=> 'Domingo 2do despues Navidad', 'tema'=>'Navidad, navidad', 'fecha'=>'2024-05-11']);
    }
}
