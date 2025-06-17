<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    protected  $fillable = [
        'titulo',
        'autor',
        'letra',
        'estado'
    ];

    // Relations
    public function category(int $coleccion_id)
    {
        return $this->belongsToMany(Category::class, 'coleccion_has_songs', 'category_id', 'song_id')->where('coleccion_id', $coleccion_id);
    }  
    
    public function coleccion1 (int $coleccion_id)
    {
        return $this->belongsToMany(Coleccion::class, 'coleccion_has_songs', 'coleccion_id', 'song_id')->where('coleccion_id', $coleccion_id);
    }

    public function coleccion ()
    {
        return $this->belongsToMany(Coleccion::class, 'coleccion_has_songs', 'coleccion_id', 'song_id');
    }    

}
