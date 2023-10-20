<?php

namespace App\Http\Controllers;
use App\Models\subcategorias;
use App\Models\categorias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class subcategoriasController extends Controller
{
    public function index(){
        
        if (isset(Auth::user()->rol) && Auth::user()->rol != 'administrador') {
            echo "<script>window.location.href = '../';</script>";
        }

        $subcategorias = subcategorias::with('categoria')->get();
        
        $categorias = categorias::all();

        return view('solicitudes.subcategorias', compact('subcategorias', 'categorias'));
    }

    public function crear(Request $request){
        
        //return $request;
        
        $subcategoria = new subcategorias;

        $subcategoria->nombre          = $request->nombre;
        $subcategoria->categoria_id    = $request->categoria_id;

        $subcategoria->save();

        return Redirect::route('subcategorias')->with('success', 'Sub-Categoria Registrada Exitosamente');

    }

    public function editar(Request $request, $id)
    {
       // return $request;
      
        $subcategoria = subcategorias::find($id);
        
        $subcategoria->nombre          = $request->input('nombre');
        $subcategoria->categoria_id    = $request->input('categoria_id');
            
        $subcategoria->save();

        // Redirecciona de nuevo con un mensaje de éxito
        return redirect()->route('subcategorias')->with('success', 'Sub-Categoria actualizada con éxito');
    }

    public function delete($id) {
    
        subcategorias::destroy($id);

        return Redirect::route('subcategorias')->with('success', 'Sub-Categoria Eliminada con Éxito');
}
}
