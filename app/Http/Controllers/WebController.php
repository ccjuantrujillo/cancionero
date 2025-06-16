<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function lecturas()
    {
        return view('public.lectura');
    }

    public function cancionero()
    {
        return view('public.cancion');
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
