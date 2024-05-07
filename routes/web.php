<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolesController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login',[SessionController::class, 'create'])->name('login.index');
Route::post('/login',[SessionController::class, 'store'])->name('login.store');

Route::get('/cliente',[RolesController::class, 'cliente'])->middleware('auth.cliente')->name('home.cliente');
Route::get('/contador',[RolesController::class, 'contador'])->middleware('auth.contador')->name('home.contador');
Route::get('/encargado',[RolesController::class, 'encargado'])->middleware('auth.encargado')->name('home.encargado');
Route::get('/supervisor',[RolesController::class, 'supervisor'])->middleware('auth.supervisor')->name('home.supervisor');
Route::get('/vendedor',[RolesController::class, 'vendedor'])->middleware('auth.vendedor')->name('home.vendedor');

Route::get('/listar-productos',[ProductoController::class, 'index'])->name('lista');
Route::get('/productos/{id}', [ProductoController::class, 'verDetalles'])->name('detalles');

