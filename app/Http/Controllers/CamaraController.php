<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CamaraController extends Controller
{
    public function abrirCamara()
    {
        return view('HojaCampo.CrearHC.camara');
    }
}
