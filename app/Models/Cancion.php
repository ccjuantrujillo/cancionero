<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $primaryKey = 'CANCP_Codigo';
    
    protected $table      = 'cancion';
    
    protected $fillable   = [
        'CANCC_Autor',
        'CANCC_Titulo',
        'CANCC_Letra',
        "CANCC_FlagEstado"
    ];
    
    public $timestamps    = false;

    // Relations
    public function categoria_cancion ()
    {
        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;
        return $this->belongsTo(Categoriacancion::class, 'CANCP_Codigo', 'CANCP_Codigo')
                    ->where('COMPP_Codigo', $compania_id);
    }

    public function categoria_cancion_misa ()
    {
        return $this->hasMany(Categoriacancion::class, 'CANCP_Codigo', 'CANCP_Codigo');
    }

}
