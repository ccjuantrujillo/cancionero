<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioMisa extends Model
{
    protected $primaryKey = "USUMISP_Codigo";

    protected $table = "usuariomisa";

    protected $fillable = [
        "id",
        "MISAP_Codigo",
    ];

    public $timestamp = false;

    // Relations
    public function misa () 
    {
        return $this->hasOne(Misa::class, 'MISAP_Codigo', 'MISAP_Codigo');
    }
}
