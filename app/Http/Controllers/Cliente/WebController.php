<?php

namespace App\Http\Controllers\Cliente;

use Carbon\Carbon;
use App\Models\Misa;
use App\Models\Cancion;
use App\Models\UsuarioMisa;
use Illuminate\Http\Request;
use App\Models\Categoriacancion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    public function lecturas ()
    {
        $misa = Misa::with([
                    'lecturas' => function ($query) {
                            $query->select("MISAP_Codigo", "TIPOLECP_Codigo", "LECTC_Titulo", "LECTC_Descripcion")
                                    ->with([
                                        'tipo_lectura' => function ($query) {
                                            $query->select('TIPOLECP_Codigo', 'TIPOLECC_Descripcion', 'TIPOLECC_Orden')->orderBy('TIPOLECC_Orden');
                                        }
                                    ]);
                        }
                    ])
                    ->whereHas('lecturas', function ($query) {
                        return $query->whereNotNull('LECTP_Codigo');
                    })
                    ->orderBy('MISAC_Fecha', 'desc')
                    ->first();

        return view('cliente.lecturas')
                ->with('misa', $misa);
    }

    public function cancionero ()
    {
        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;

        $canciones  = Categoriacancion::where('COMPP_Codigo', $compania_id)
                            ->with([
                                'categoria' => function ($query) {
                                    $query->select('CATEGC_Descripcion', 'CATEGC_Orden', 'CATEGP_Codigo', 'CATEGC_DescripcionCorta');
                                }
                            ])
                            ->orderBy('CATEGCANCC_Orden', 'asc')
                            ->get();

        return view('cliente.cancionero')
                ->with('canciones', $canciones);
    }

    public function cancionero_detalle(Request $request)
    {
        $cancion = Cancion::with([
                        'categoria_cancion' => function ($query) {
                            $query->select('CANCP_Codigo', 'CATEGP_Codigo', 'CATEGP_Codigo2', 'CATEGCANCC_Orden');
                        }
                    ])
                    ->where('CANCP_Codigo', $request->cancion_id)
                    ->first();

        return view('cliente.cancionero_detalle')
                ->with('cancion', $cancion);
    }

    public function cancionero_detalle_misa (Request $request)
    {
        $compania_id = $request->compania_id;

        $cancion = Cancion::with([
                            'categoria_cancion_misa' => function ($query) use ($compania_id) {
                                $query->select('CANCP_Codigo', 'CATEGP_Codigo', 'CATEGP_Codigo2', 'CATEGCANCC_Orden')
                                        ->where('COMPP_Codigo', $compania_id);
                            }
                        ])
                        ->where('CANCP_Codigo', $request->cancion_id)
                        ->first();

        return view('cliente.cancionero_detalle_misa')
            ->with('cancion', $cancion);
    }

    public function misas ()
    {
        $usuario_id = Auth::id();

        $usuariomisas = UsuarioMisa::with([
                            'misa' => function ($query) {
                                $query->select('MISAP_Codigo', 'MISAC_Descripcion', 'MISAC_Fecha')
                                    ->orderBy('MISAC_Fecha','desc');
                            }
                        ])
                        ->where('id', $usuario_id)
                        ->get();
                        
        $rango = [];

        if (!$usuariomisas->isEmpty()) {
            $fechas = $usuariomisas->pluck('misa')->pluck('MISAC_Fecha');
            $minimo = $fechas->min()->year;
            $maximo = $fechas->max()->year;
            $rango  = range($maximo, $minimo);
        }

        return view('cliente.misas')
                ->with('usuariomisas', $usuariomisas)
                ->with('rango', $rango);
    }

    public function misa_detalle (Request $request) 
    {
        $misa = Misa::with([
                    'misa_cancion' => function ($query) {
                        $query->select('CATEGCANCP_Codigo', 'MISAP_Codigo', 'RITOP_Codigo')
                            ->with([
                                'rito' => function ($query) {
                                    $query->select('RITOP_Codigo', 'RITOC_DescripcionCorta')
                                            ->orderBy('RITOC_Orden', 'asc');
                                },
                                'misa' => function ($query) {
                                    $query->select('MISAP_Codigo', 'MISAC_Descripcion', 'MISAC_Fecha');
                                },
                                'categoria_cancion' => function ($query) {
                                    $query->select('CATEGCANCP_Codigo', 'CANCP_Codigo', 'CATEGP_Codigo', 'CATEGP_Codigo2', 'CATEGCANCC_Orden')
                                        ->with([
                                            'cancion' => function ($query) {
                                                $query->select('CANCP_Codigo', 'CANCC_Titulo', 'CANCC_Letra');
                                            }
                                        ]);
                                }
                            ]);
                    }
                ])
                ->where('MISAP_Codigo', $request->misa_id)
                ->first();

        return view('cliente.misa_detalle')
                ->with('misa', $misa);
    }

    /*public function ingresar ()
    {
        return view('cliente.ingresar');
    }*/

}

?>