<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liturgy extends Model
{
    protected $table = 'liturgies';

    protected  $fillable = [
        'descripcion',
        'tema',
        'fecha',
        'descripcion_corta',
        'estado'
    ];
}
