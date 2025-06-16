<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function inicio()
    {
        return view('web.inicio');
    }

    public function quienes()
    {
        return view('web.quienes');
    }
    
    public function nosotros()
    {
        return view('web.nosotros');
    }    
}
