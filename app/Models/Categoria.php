<?php

namespace App\Models;

use App\Models\Categoriacancion;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'CATEGP_Codigo';

    protected $table = "categoria";
    
    protected $fillable = [
        "COMPP_Codigo",
        "CATEGC_Descripcion",
        "CATEGC_DescripcionCorta",
        "CATEGC_FlagEstado",
        "CATEGC_Orden",
    ];

    public $timestamps = false;    

    // Relations
    public function canciones ()
    {
        return $this->hasMany(Categoriacancion::class, 'CATEGP_Codigo', 'CATEGP_Codigo');
    }

}
