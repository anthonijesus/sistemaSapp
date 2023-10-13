<?php

use App\Http\Controllers\solTIController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/usuarios', [ProfileController::class, 'index'])->name('profile.usuarios');
    Route::get('/profile',          [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',        [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile',         [ProfileController::class, 'crear'])->name('profile.crear');
    Route::post('/profile/{id}',    [ProfileController::class, 'editar'])->name('profile.editar');
    Route::delete('/profile',       [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{id}',  [ProfileController::class, 'delete'])->name('profile.borrar');
});

Route::get('solicitudes/solTI', [solTIController::class, 'index'])->name('solTI');

Route::controller(categoriasController::class)->group(function(){
    Route:: get('solicitudes/categorias', 'index')->name('categorias');
    Route::post('solicitudes/categorias', 'crear')->name('categorias.crear');
});

require __DIR__.'/auth.php';
