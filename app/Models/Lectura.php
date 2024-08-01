<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    protected $primaryKey = "LECTP_Codigo";

    protected $table = "lectura";

    protected $fillable = [
        "MISAP_Codigo",        
        "TIPOLECP_Codigo",
        "LECTC_Titulo",
        "LECTC_Descripcion",
    ];

    public $timestamps = true;

    // Relations
    public function tipo_lectura() {
        return $this->belongsTo(Tipolectura::class, 'TIPOLECP_Codigo', 'TIPOLECP_Codigo');
    }

}
