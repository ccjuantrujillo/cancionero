<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeLecture extends Model
{
    protected $table = 'type_lectures';

    protected  $fillable = [
        'descripcion',
        'orden',
    ];
}
