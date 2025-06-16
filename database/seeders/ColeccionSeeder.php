<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coleccions')->insert(['descripcion'=> 'Cancionero Misionero', 'orden'=> 1]);
        DB::table('coleccions')->insert(['descripcion'=> 'Cancionero Parroquial', 'orden'=> 2]);
        DB::table('coleccions')->insert(['descripcion'=> 'Cancionero Parroquial Misionero', 'orden'=> 3, 'defecto'=>1]);
    }
}
