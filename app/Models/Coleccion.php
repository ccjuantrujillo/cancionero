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

}
