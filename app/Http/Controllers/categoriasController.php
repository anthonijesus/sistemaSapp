<?php

namespace App\Http\Controllers;
use App\Models\categorias;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function index(){

        $categorias = categorias::all();

        return view('solicitudes.categorias', compact('categorias'));
    }

    public function crear(Request $request){
        //return $request;
        $categoria = new categorias;

        $categoria->nombre       = $request->nombre;
        $categoria->descripcion  = $request->descripcion;

        $categoria->save();

        return Redirect::route('categorias')->with('success', 'Categoria Registrada Exitosamente');

    }
    
}
