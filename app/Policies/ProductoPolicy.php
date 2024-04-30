<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class ProductoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Usuario $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $user, Producto $producto): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Usuario $user): bool
    {
        if( $user->rol == "Cliente" ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Usuario $user, Producto $producto): bool
    {
        if($user->id == $producto->propietario_id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $user, Producto $producto): bool
    {
        return $user->rol == "Encargado" ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $user, Producto $producto): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $user, Producto $producto): bool
    {
        //
    }

}
