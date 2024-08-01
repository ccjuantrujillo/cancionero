<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipolectura extends Model
{
    protected $primaryKey = "TIPOLECP_Codigo";

    protected $table = "tipo_lectura";

    protected $fillable = [
        "TIPOLECC_Descripcion",        
        "TIPOLECC_Orden",
    ];

    public $timestamps    = true;

}
