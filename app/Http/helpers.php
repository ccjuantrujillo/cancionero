<?php
use App\Models\Compania;
use App\Models\Categoria;
use App\User;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getUserData'))
{
    function getUserData ()
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $usuario = User::where('id', $user_id)->first();
            $nombre  = $usuario->name ?? 'Sin Asignar';
            $usuario_id = $usuario->id ?? 0;
        }
        else {
            $usuario_id = 0;
            $nombre     = 'Sin Asignar';
        }

        $data = (object)[
            'usuario_id' => $usuario_id,
            'nombre'     => $nombre
        ];

        return $data;
    }
}

if (!function_exists('getCompanias')) {
    function getCompanias()
    {
        $companias = Compania::where('COMPC_FlagEstado', 1)->orderBy('COMPC_Orden')->get();
        return $companias;

    }
}

if (!function_exists('getCompaniaDefecto')) {
    function getCompaniaDefecto()
    {
        return Compania::where('COMPC_FlagEstado', 1)
                        ->where('COMPC_FlagDefecto', 1)
                        ->first();
    }
}

if (!function_exists('getCategorias')) {
    function getCategorias($compania_id)
    {

        $categorias = Categoria::where([
                    ['CATEGC_FlagEstado', 1],
                    ['COMPP_Codigo', $compania_id]
                ])->get();
        
        return $categorias;

    }
}
