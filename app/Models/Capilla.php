<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capilla extends Model
{
    protected $primaryKey = 'CAPIP_Codigo';

    protected $table = "capilla";

    protected $fillable = [
        "CAPIC_Descripcion"
    ];

    public $timestamps = false;      
}
