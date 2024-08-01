<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rito extends Model
{
    protected $primaryKey = 'RITOP_Codigo';

    protected $table = "rito";
    
    protected $fillable = [
        "RITOC_Descripcion",
        "RITOC_DescripcionCorta",
        "RITOC_FlagEstado",
        "RITOC_Orden"
    ];

    public $timestamps = false;   
    
    // Relations

}
