<?php

namespace App\Http\Controllers;

use App\Mail\CumpleanosMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function __construct()
    {

    }

    public function MensajeCumpleanos ()
    {
        $email = "martin.trujillo@uni.pe";
    
        $data = [
            "codigo" => "324324",
            "estado" => "1",
            "subject" => "Relacion de cumpleaños"
        ];
    
        $mailable = new CumpleanosMail($data);
        Mail::to($email)->queue($mailable);

        dd("Se envio");
        
    }
}
