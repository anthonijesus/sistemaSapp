<?php

namespace App\Http\Controllers;
use App\Models\categorias;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

        $categorias = categorias::all(); 

        return view('dashboard', compact('categorias'));
    }
}
