<?php
namespace App\Services;

use App\Models\Coleccion;
use Illuminate\Support\Facades\DB;

class ColeccionService
{
    public function getAll()
    {
        return Coleccion::all();
    }

    public function getById($id)
    {
        return Coleccion::findOrFail($id);
    }

    public function create(array $data)
    {
        return Coleccion::create($data);
    }

    public function update($id, array $data)
    {
        $coleccion = Coleccion::findOrFail($id);
        $coleccion->update($data);
        return $coleccion;
    }

    public function delete($id)
    {
        $coleccion = Coleccion::findOrFail($id);
        $coleccion->delete();
        return true;
    }
}
