<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{

    const CANCIONERO_MISIONERO  = 1;
    const CANCIONERO_PARROQUIAL = 2;
    const CANCIONERO_PARROQUIAL_MISIONERO = 3;

    protected $primaryKey = 'COMPP_Codigo';

    protected $table      = 'compania';

    protected $fillable   = [
        'COMPC_Descripcion', 
        "COMPC_Imagen",
        'COMPC_FlagEstado',
        "COMPC_FlagDefecto"
    ];

    public $timestamps    = false;
    
    
}
