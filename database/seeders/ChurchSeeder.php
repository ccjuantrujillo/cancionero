<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChurchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('churches')->insert(['descripcion'=> 'Cristo Salvador']);
        DB::table('churches')->insert(['descripcion'=> 'Divina Misericordia']);
        DB::table('churches')->insert(['descripcion'=> 'Santa Rosa']);
        DB::table('churches')->insert(['descripcion'=> 'Medalla Milagrosa']);
        DB::table('churches')->insert(['descripcion'=> 'Santa Rita de Casia']);
        DB::table('churches')->insert(['descripcion'=> 'Madre de Cristo']);
        DB::table('churches')->insert(['descripcion'=> 'Nuestra Señora del Rosario']);
        DB::table('churches')->insert(['descripcion'=> 'San Agustín']);
    }
}
