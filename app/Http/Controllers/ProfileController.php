<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function index(){ //administra la vista y la tabla de usuarios
        
        $users = User::orderBy('id')->paginate('5');

        return view('profile.usuarios', compact('users'));
    }

    /**
     * Actualiza el Perfil del usuario
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Edita en tabla de usuarios
     */
    public function editar(Request $request, $id)
    {
        
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'rol' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        // Verifica si la validación falla
        if ($validator->fails()) {
            return redirect()
                ->route('profile.usuarios')
                ->withErrors($validator)
                ->withInput();
        }

        // Busca el usuario existente por su ID
        $user = User::find($id);

        // Verifica si el usuario existe
        if (!$user) {
            // Manejar el caso en el que el usuario no existe
            return redirect()->route('profile.usuarios')->with('error', 'Usuario no encontrado');
        }


        
        // Actualiza los atributos del usuario con los valores del formulario
        if($request->password != ""){ // valida si por viene por variable request un vacio en el pass se ejecute o no la actualización
            if (strlen($request->password) >= 8) {
                $user->name = $request->input('name');
                $user->rol = $request->input('rol');
                $user->telefono = $request->input('telefono');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
        }else{
                // Redirecciona de nuevo con un mensaje de error
                return Redirect::route('profile.usuarios')->with('error', 'No se pudo actualizar el usuario, el Password tiene menos de 8 digitos');
            }
        }else {
            
                $user->name = $request->input('name');
                $user->rol = $request->input('rol');
                $user->telefono = $request->input('telefono');
                $user->email = $request->input('email');
        }

        // Guarda los cambios en la base de datos
        $user->save();

        // Redirecciona de nuevo con un mensaje de éxito
        return redirect()->route('profile.usuarios')->with('success', 'Usuario actualizado con éxito');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function delete($id) 
    {

        if($id == 1){
            
            return Redirect::route('profile.usuarios')->with('error', 'No puede borrar el usuario administrador');
        }else{
            
            User::destroy($id);

            return Redirect::route('profile.usuarios')->with('success', 'Usuario Eliminado con Éxito');
        }
      
    }
}
