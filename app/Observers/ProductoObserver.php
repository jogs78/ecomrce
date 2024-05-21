<?php

namespace App\Observers;

use App\Models\Registro;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     */
    public function created(Producto $producto): void
    {
        $usuario =Auth::user();
        if(! is_null($usuario) ){
            $evento = new Registro();
            $evento->quien = Auth::user()->correo;
            $evento->que = "Agrega un productos en el sistema.";
            $evento->save(); 
        }

    }

    /**
     * Handle the Producto "updated" event.
     */
    public function updated(Producto $producto): void
    {
       $evento = new Registro();
       $evento->quien = Auth::user()->correo;
       $evento->que = "Actualizo el productos del sistema.";
       $evento->save();
}

    /**
     * Handle the Producto "deleted" event.
     */
    public function deleted(Producto $producto): void
    {
       $evento = new Registro();
       $evento->quien = Auth::user()->correo;
       $evento->que = "Elimino el productos del sistema.";
       $evento->save();
}

    /**
     * Handle the Producto "restored" event.
     */
    public function restored(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "force deleted" event.
     */
    public function forceDeleted(Producto $producto): void
    {
        //
    }
}
