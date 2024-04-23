<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/encargado', 'EncargadoController@index')->name('encargado.dashboard');
Route::get('/cliente', 'ClienteController@index')->name('cliente.dashboard');
Route::get('/contador', 'ContadorController@index')->name('contador.dashboard');
Route::get('/supervisor', 'SupervisorController@index')->name('supervisor.dashboard');
Route::get('/vendedor', 'VendedorController@index')->name('vendedor.dashboard');