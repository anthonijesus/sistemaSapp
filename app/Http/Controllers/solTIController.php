<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class solTIController extends Controller
{
    public function index(){
        return view('solicitudes.solTI');
    }
}
