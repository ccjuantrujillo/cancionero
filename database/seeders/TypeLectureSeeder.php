<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_lectures')->insert(['descripcion'=> '1era Lectura', 'orden'=>1]);
        DB::table('type_lectures')->insert(['descripcion'=> 'Salmo', 'orden'=>2]);
        DB::table('type_lectures')->insert(['descripcion'=> '2da Lectura', 'orden'=>3]);
        DB::table('type_lectures')->insert(['descripcion'=> 'Evangelio', 'orden'=>4]);                        
    }
}
