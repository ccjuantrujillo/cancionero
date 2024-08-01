<?php

namespace App\Models;

use App\Models\Cancion;
use App\Models\Compania;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class Categoriacancion extends Model
{
    protected $primaryKey = 'CATEGCANCP_Codigo';

    protected $table = "categoriacancion";
    
    protected $fillable = [
        "COMPP_Codigo",
        "CANCP_Codigo",
        "CATEGP_Codigo",
        "CATEGP_Codigo2",
        "CATEGCANCC_Orden",
        "CATEGCANCC_FlagEstado"
    ];

    public $timestamps = true;  

    // Relations
    public function categoria ()
    {
        return $this->belongsTo(Categoria::class, 'CATEGP_Codigo', 'CATEGP_Codigo');
    }

    public function otra_categoria ()
    {
        return $this->belongsTo(Categoria::class, 'CATEGP_Codigo2', 'CATEGP_Codigo');
    }

    public function cancion ()
    {
        return $this->belongsTo(Cancion::class, 'CANCP_Codigo', 'CANCP_Codigo'); 
    }

    public function compania ()
    {
        return $this->belongsTo(Compania::class, 'COMPP_Codigo', 'COMPP_Codigo'); 
    }
    
}