<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RitualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rituals')->insert(['descripcion'=> 'Procesion', 'descripcion_corta'=> 'Procesion', 'orden'=>1]);
        DB::table('rituals')->insert(['descripcion'=> 'Entrada', 'descripcion_corta'=> 'Entrada', 'orden'=>2]);
        DB::table('rituals')->insert(['descripcion'=> 'Perdon', 'descripcion_corta'=> 'Perdon', 'orden'=>3]);
        DB::table('rituals')->insert(['descripcion'=> 'Pregon', 'descripcion_corta'=> 'Pregon', 'orden'=>4]);
        DB::table('rituals')->insert(['descripcion'=> 'Salmo SS', 'descripcion_corta'=> 'Salmo SS', 'orden'=>5]);
        DB::table('rituals')->insert(['descripcion'=> 'Gloria', 'descripcion_corta'=> 'Gloria', 'orden'=>6]);
        DB::table('rituals')->insert(['descripcion'=> 'Salmo', 'descripcion_corta'=> 'Salmo', 'orden'=>7]);
        DB::table('rituals')->insert(['descripcion'=> 'Aleluya', 'descripcion_corta'=> 'Aleluya', 'orden'=>8]);
        DB::table('rituals')->insert(['descripcion'=> 'Letanias', 'descripcion_corta'=> 'Letanias', 'orden'=>9]);
        DB::table('rituals')->insert(['descripcion'=> 'Bendicion agua', 'descripcion_corta'=> 'Bendicion agua', 'orden'=>10]);
        DB::table('rituals')->insert(['descripcion'=> 'Ofertorio', 'descripcion_corta'=> 'Ofertorio', 'orden'=>11]);
        DB::table('rituals')->insert(['descripcion'=> 'Santo', 'descripcion_corta'=> 'Santo', 'orden'=>12]);
        DB::table('rituals')->insert(['descripcion'=> 'Padre Nuestro', 'descripcion_corta'=> 'Padre Nuestro', 'orden'=>13]);
        DB::table('rituals')->insert(['descripcion'=> 'Paz', 'descripcion_corta'=> 'Paz', 'orden'=>14]);
        DB::table('rituals')->insert(['descripcion'=> 'Cordero', 'descripcion_corta'=> 'Cordero', 'orden'=>15]);
        DB::table('rituals')->insert(['descripcion'=> 'Comunión', 'descripcion_corta'=> 'Comunión', 'orden'=>16]);
        DB::table('rituals')->insert(['descripcion'=> 'Salida', 'descripcion_corta'=> 'Salida', 'orden'=>17]);
        DB::table('rituals')->insert(['descripcion'=> 'Adoración', 'descripcion_corta'=> 'Adoración', 'orden'=>18]);
    }
}
