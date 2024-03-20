<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PuertaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Categoria;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('saludar', function (){
    return "HOLA";
});

Route::get('entrar',[PuertaController::class, 'entrada']);
Route::get('salir',[PuertaController::class, 'salida']);
Route::post('validar',[PuertaController::class, 'valida']);

Route::get('listar-usuarios',[UsuarioController::class,'index'])->name('lista');
Route::get('crear-usuarios',[UsuarioController::class,'create'])->name('crear');
Route::post('agregar-usuarios',[UsuarioController::class,'store'])->name('alta');
Route::get('mostrar-usuarios/{usuario}',[UsuarioController::class,'show'])->name('mostrar');
Route::get('editar-usuarios/{usuario}',[UsuarioController::class,'edit'])->name('editar');
Route::put('actualiza-usuarios/{usuario}',[UsuarioController::class,'update'])->name('actualiza');
Route::delete('destruir-usuarios/{usuario}',[UsuarioController::class,'destroy'])->name('destruir');

Route::resource('categorias', CategoriaController::class);