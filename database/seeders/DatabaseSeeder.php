<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SongSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(ColeccionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RitualSeeder::class);
        $this->call(SongSeeder::class);
        $this->call(ColeccionHasSongSeeder::class);
        $this->call(ChurchSeeder::class);
        $this->call(LiturgySeeder::class);
    }
}
