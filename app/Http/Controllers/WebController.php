<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Services\WebService;
use Illuminate\Http\Request;

class WebController extends Controller
{

    protected $webService;

    public function __construct(WebService $service)
    {
        $this->webService = $service;
    }

    public function lecturas()
    {
        // The last lecture
        $ult_lectura = $this->webService->last_lecture();

        // The five last liturgy
        $five_liturgy = $this->webService->five_last_liturgy();

        return view('public.lectura')
                ->with('ult_lectura', $ult_lectura)
                ->with('five_misas', $five_liturgy);
    }

    public function cancionero()
    {
        $coleccion_id = 3;

        // Songs
        $canciones = $this->webService->colection_has_songs($coleccion_id);
        //echo $canciones;
        return view('public.cancion')->with('canciones', $canciones);
    }
    
    public function search_cancion()
    {
        return view('public.cancion');
    }    

    public function cancionero_detalle()
    {
        return view('public.cancion');
    }  
    
    public function cancionero_detalle_misa()
    {
        return view('public.cancion');
    }  
    
    public function misas()
    {
        return view('public.misa');
    }  
    
    public function misa_detalle()
    {
        return view('public.misa');
    }  
    
    public function cambiar_cancion()
    {
        return view('public.cancion');
    }      

    public function cambiar_cancion_misa()
    {
        return view('public.cancion');
    }       
}
