<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected  $fillable = [
        'descripcion',
        'descripcion_corta',
        'orden',
        'coleccion_id',
    ];

}
