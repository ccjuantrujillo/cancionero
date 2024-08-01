<?php

namespace App\Models;

use App\Models\Misa;
use App\Models\Rito;
use App\Models\Cancion;
use App\Models\Categoriacancion;
use Illuminate\Database\Eloquent\Model;

class Misacancion extends Model
{
    protected $primaryKey = 'MISACANP_Codigo';

    protected $table = "misacancion";
    
    protected $fillable = [
            "CATEGCANCP_Codigo",
            "MISAP_Codigo",
            "RITOP_Codigo"
    ];

    public $timestamps = false;  

    // Relations
    public function misa ()
    {
        return $this->belongsTo(Misa::class, 'MISAP_Codigo', 'MISAP_Codigo');
    }

    public function rito ()
    {
        return $this->belongsTo(Rito::class, 'RITOP_Codigo', 'RITOP_Codigo'); 
    }
    
    public function categoria_cancion ()
    {
        return $this->belongsTo(Categoriacancion::class, 'CATEGCANCP_Codigo', 'CATEGCANCP_Codigo');
    }
}