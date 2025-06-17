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

    // Relations
    public function songs(int $coleccion_id)
    {
        return $this->belongsToMany(Song::class, 'coleccion_has_songs')->where('coleccion_id', $coleccion_id);
    }

}
