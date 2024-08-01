<?php

namespace App\Models;
use App\Models\Misacancion;
use Illuminate\Database\Eloquent\Model;

class Misa extends Model
{
    protected $primaryKey = 'MISAP_Codigo';

    protected $table = "misa";
    
    protected $fillable = [
        "MISAC_Descripcion",
        "MISAC_Fecha",
        "MISAC_FlagEstado",
        'MISAC_FlagLecturas',
        'MISAC_Tema'
    ]; 

    protected $dates = [
        'MISAC_Fecha',
    ];

    public $timestamps = false;   

    // Relations
    public function misa_cancion ()
    {
        return $this->hasMany(Misacancion::class, 'MISAP_Codigo', 'MISAP_Codigo');
    }

    public function lecturas ()
    {
        return $this->hasMany(Lectura::class, 'MISAP_Codigo', 'MISAP_Codigo');
    }
    
}
