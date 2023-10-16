<?php

namespace App\Http\Controllers;
use App\Models\subcategorias;
use App\Models\categorias;

use Illuminate\Http\Request;

class solicitudesController extends Controller
{
    public function index($id){
        
        $categoria = categorias::find($id);

        //if (!$categoria) {
            // Manejo de error si la categoría no se encuentra
        //}

        $subcategorias = $categoria->subcategorias;
         
        return view('solicitudes.solicitudes', compact('subcategorias'));
    }
}
