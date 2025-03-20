<?php

use App\Models\Capilla;
use Illuminate\Database\Seeder;

class CapillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Capilla::create(['CAPIC_Descripcion' => 'Cristo Salvador']);
        Capilla::create(['CAPIC_Descripcion' => 'Divina Misericordia']);
        Capilla::create(['CAPIC_Descripcion' => 'Santa Rosa']);
        Capilla::create(['CAPIC_Descripcion' => 'Medalla Milagrosa']);
        Capilla::create(['CAPIC_Descripcion' => 'Santa Rita de Casia']);
        Capilla::create(['CAPIC_Descripcion' => 'Madre de Cristo']);
        Capilla::create(['CAPIC_Descripcion' => 'Nuestra Señora del Rosario']);
        Capilla::create(['CAPIC_Descripcion' => 'San Agustín']);
        
    }
}
