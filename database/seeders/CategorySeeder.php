<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(['descripcion'=> 'Cantos de Entrada', 'descripcion_corta'=> 'Entrada','coleccion_id'=>3, 'orden'=>1]);
        DB::table('categories')->insert(['descripcion'=> 'Cantos de Perdon', 'descripcion_corta'=> 'Perdon','coleccion_id'=>3, 'orden'=>2]);
        DB::table('categories')->insert(['descripcion'=> 'Gloria', 'descripcion_corta'=> 'Gloria','coleccion_id'=>3, 'orden'=>3]);
        DB::table('categories')->insert(['descripcion'=> 'Lecturas y Salmos', 'descripcion_corta'=> 'Salmo','coleccion_id'=>3, 'orden'=>4]);
        DB::table('categories')->insert(['descripcion'=> 'Aleluya o proclamacion', 'descripcion_corta'=> 'Aleluya o proclamacion','coleccion_id'=>3, 'orden'=>5]);
        DB::table('categories')->insert(['descripcion'=> 'Ofertorio', 'descripcion_corta'=> 'Ofertorio','coleccion_id'=>3, 'orden'=>6]);
        DB::table('categories')->insert(['descripcion'=> 'Santo', 'descripcion_corta'=> 'Santo','coleccion_id'=>3, 'orden'=>7]);
        DB::table('categories')->insert(['descripcion'=> 'Padre Nuestro', 'descripcion_corta'=> 'Padre Nuestro','coleccion_id'=>3, 'orden'=>8]);
        DB::table('categories')->insert(['descripcion'=> 'Paz', 'descripcion_corta'=> 'Paz','coleccion_id'=>3, 'orden'=>9]);
        DB::table('categories')->insert(['descripcion'=> 'Cordero', 'descripcion_corta'=> 'Cordero','coleccion_id'=>3, 'orden'=>10]);
        DB::table('categories')->insert(['descripcion'=> 'Comunion', 'descripcion_corta'=> 'Comunion','coleccion_id'=>3, 'orden'=>11]);
        DB::table('categories')->insert(['descripcion'=> 'Meditacion', 'descripcion_corta'=> 'Meditacion','coleccion_id'=>3, 'orden'=>12]);
        DB::table('categories')->insert(['descripcion'=> 'Cantos a Maria', 'descripcion_corta'=> 'Marianos','coleccion_id'=>3, 'orden'=>13]);
        DB::table('categories')->insert(['descripcion'=> 'Cantos al Espiritu Santo', 'descripcion_corta'=> 'Espiritu Santo','coleccion_id'=>3, 'orden'=>14]);
        DB::table('categories')->insert(['descripcion'=> 'Navidad', 'descripcion_corta'=> 'Villancicos','coleccion_id'=>3, 'orden'=>15]);
        DB::table('categories')->insert(['descripcion'=> 'Cantos Diversos', 'descripcion_corta'=> 'Varios','coleccion_id'=>3, 'orden'=>16]);
    }
}
