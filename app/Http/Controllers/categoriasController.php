<?php

namespace App\Http\Controllers;
use App\Models\categorias;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoriasController extends Controller
{
    public function index(){

        if (isset(Auth::user()->rol) && Auth::user()->rol != 'administrador') {
            echo "<script>window.location.href = '../';</script>";
        }

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

    public function editar(Request $request, $id)
    {
 
        $categoria = categorias::find($id);
        
            $categoria->nombre      = $request->input('nombre');
            $categoria->descripcion = $request->input('descripcion');
            
        $categoria->save();

        // Redirecciona de nuevo con un mensaje de éxito
        return redirect()->route('categorias')->with('success', 'Categoria actualizada con éxito');
    }

    public function delete($id) {
    
            categorias::destroy($id);

            return Redirect::route('categorias')->with('success', 'Categoria Eliminada con Éxito');
    }
    
}
