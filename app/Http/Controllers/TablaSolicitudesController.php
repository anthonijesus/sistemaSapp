<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablaSolicitudesController extends Controller
{
    public function show(){
        
        return view('solicitudes.tabla_solicitudes');
    }
}
