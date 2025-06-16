<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColeccionHasSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coleccion_has_songs')->insert(['coleccion_id'=> 3, 'category_id'=> 6,'song_id'=>1, 'ritual_id'=>11]);
        DB::table('coleccion_has_songs')->insert(['coleccion_id'=> 3, 'category_id'=> 3,'song_id'=>2, 'ritual_id'=>5]);
    }
}
