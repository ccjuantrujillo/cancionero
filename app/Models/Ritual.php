<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ritual extends Model
{
    protected $table = 'lecture_has_details';
    protected  $fillable = [
        'descripcion',
        'descripcion_corta',
        'orden',
        'estado'
    ];
}
