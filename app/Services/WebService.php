<?php
namespace App\Services;

use App\Models\Song;
use App\Models\Lecture;
use App\Models\Liturgy;
use App\Models\Coleccion;
use Illuminate\Support\Facades\DB;

class WebService
{
    public function last_lecture ()
    {
        $lectura = Lecture::with([
                    'details' => function ($query) {
                        $query->select('lecture_id', 'titulo', 'descripcion', 'type_lecture_id')->with('type');
                    }
                ])
                ->orderBy('fecha', 'desc');

        // The last lecture
        return $lectura->first();
    }

    public function five_last_liturgy ()
    {
        return Liturgy::take(5)->get();
    }

    public function colection_has_songs ($coleccion_id)
    {
        $songs = Song::with([
                    'coleccion' => function ($query) use ($coleccion_id) {
                        $query->where('coleccion_id', $coleccion_id);
                    }
                ])               
                ->get();

        return $songs;
    }
}