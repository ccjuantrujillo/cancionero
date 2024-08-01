<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const ID_CONFIGURACION = 2;

    protected $primaryKey = 'MENU_Codigo';

    protected $table      = 'menu';

    protected $fillable   = [
        'MENU_Codigo_Padre',
        'MENU_Titulo',
        'MENU_Url',
        'MENU_AccesoRapido',
        'MENU_OrderBy',
        "MENU_FlagEstado"
    ];

    public $timestamps    = false;
}
