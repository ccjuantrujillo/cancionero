<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    protected $table = 'coleccions';

    protected  $fillable = [
        'descripcion',
        'imagen',
        'orden',
        'defecto',
        'estado',
    ];

    // Relations
    public function songs(int $coleccion_id)
    {
        return $this->belongsToMany(Song::class, 'coleccion_has_songs')->where('coleccion_id', $coleccion_id);
    }    

}
