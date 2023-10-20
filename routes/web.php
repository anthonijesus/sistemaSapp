<?php

use App\Http\Controllers\categoriasController;
use App\Http\Controllers\subcategoriasController;
use App\Http\Controllers\solicitudesController;
use App\Http\Controllers\dashboardController;
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

Route::get('/', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/usuarios', [ProfileController::class, 'index'])->name('profile.usuarios');
    Route::get('/profile',          [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',        [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile',         [ProfileController::class, 'crear'])->name('profile.crear');
    Route::patch('/profile/{id}',    [ProfileController::class, 'editar'])->name('profile.editar');
    Route::delete('/profile',       [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{id}',  [ProfileController::class, 'delete'])->name('profile.borrar');
});

//Route::get('solicitudes/solTI', [solTIController::class, 'index'])->name('solTI');

Route::controller(categoriasController::class)->group(function(){
    Route::get('solicitudes/categorias', 'index')->name('categorias');
    Route::post('solicitudes/categorias', 'crear')->name('categorias.crear');
    Route::post('solicitudes/categorias/{id}', 'editar')->name('categorias.editar');
    Route::delete('solicitudes/categorias/{id}', 'delete')->name('categorias.borrar');
});
Route::controller(subcategoriasController::class)->group(function(){
    Route::get('solicitudes/subcategorias', 'index')->name('subcategorias');
    Route::post('solicitudes/subcategorias', 'crear')->name('subcategorias.crear');
    Route::post('solicitudes/subcategorias/{id}', 'editar')->name('subcategorias.editar');
    Route::delete('solicitudes/subcategorias/{id}', 'delete')->name('subcategorias.borrar');
});


Route::controller(solicitudesController::class)->group(function(){
    Route::get('solicitudes/solicitudes/{id}', 'index')->name('solicitudes');
    Route::post('solicitudes/solicitudes', 'crear')->name('solicitudes.crear');
    Route::get('solicitudes/tabla_sol/{id}', 'show')->name('tabla_sol');
    Route::get('solicitudes/tabla_soli/{id}', 'shows')->name('tabla_soli');
});

require __DIR__.'/auth.php';
