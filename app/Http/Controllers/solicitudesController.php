<?php

namespace App\Http\Controllers;
use App\Models\subcategorias;
use App\Models\categorias;
use App\Models\tabla_solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class solicitudesController extends Controller
{
    public function index($id){
        
        $categoria = categorias::find($id);
        
        //if (!$categoria) {
            // Manejo de error si la categoría no se encuentra
        //}

        $subcategorias   = $categoria->subcategorias;

        $categoriaNombre = $categoria->nombre;
        $categoriaID = $categoria->id;
        //return $categoriaID;

        return view('solicitudes.solicitudes', compact('subcategorias', 'categoriaNombre', 'categoriaID'));
    }

    public function crear(Request $request){
        
        //return $request;
        
        $solicitudes = new tabla_solicitudes;

        $solicitudes->base               = $request->base;
        $solicitudes->usuario            = $request->usuario;
        $solicitudes->detalle_sol        = $request->detalle_sol;
        $solicitudes->medio_sol          = $request->medio_sol;
        $solicitudes->observacion        = $request->observacion;
        $solicitudes->clasificacion      = $request->clasificacion;
        $solicitudes->subcategoria_id    = $request->subcategoria_id;
        $solicitudes->categoria_id       = $request->categoria_id;

        $solicitudes->save();

        return Redirect::route('tabla_sol', $request->subcategoria_id)->with('success', 'Solicitud Registrada Exitosamente');

    }

    public function show($id){
       
        $subcategoria = subcategorias::find($id);
        
        //return $subcategoria;
        //if (!$subcategoria) {
            // Manejo de error si la subcategoría no se encuentra
        //}

        $subcategorias  = $subcategoria->tabla_sol;
        
        //return $subcategorias;
        //$tabla_solicitudes  = $tabla_sol->subcategoria;
       
        $subcategoriaNombre = $subcategoria->nombre;
        
        $categoriaNombre = $subcategoria->categoria->nombre;
        //return $categoriaID;
        

        return view('solicitudes.tabla_solicitudes', compact('subcategorias', 'subcategoriaNombre', 'categoriaNombre'));
    }
    public function shows($id){
       
        $categoria = categorias::find($id);
        
        //return $categoria;
        //if (!$subcategoria) {
            // Manejo de error si la subcategoría no se encuentra
        //}

        $subcategorias  = $categoria->tabla_sol;
        
        //return $subcategorias;
        //$tabla_solicitudes  = $tabla_sol->subcategoria;
       
        $categoriaNombre = $categoria->nombre;
        
        //$subcategoriaNombre = $categoria->subcategoria->nombre;
        //return $categoriaID;
        

        return view('solicitudes.tabla_solicitudes', compact('subcategorias', 'categoriaNombre'));
    }
}
