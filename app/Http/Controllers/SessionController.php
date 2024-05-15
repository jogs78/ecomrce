<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Consiga;
class SessionController extends Controller
{
    public function create(){
        return view('welcome');
    }

    public function store(){
       if(auth()->attempt(request(['email','password'])) == false){
        return back()->withErrores([
            'message' => 'El email o la password son incorrectos'
        ]);
       }
       
       else{
        if(auth()->user()->rol == 'Cliente'){
           return redirect('/');
        }
        elseif(auth()->user()->rol == 'Contador'){
            //llevar a contador
            return redirect('/');
        }
        elseif(auth()->user()->rol == 'Encargado'){
            return redirect('/');
        }
        elseif(auth()->user()->rol == 'Supervisor'){
            $Usuarios = User::all();
            $CantidadUsuarios = count($Usuarios);
            $UltimoUsuarioRegistrado = User::latest()->first();
            $Transacciones = Transaccion::all();

            $ProductosNConsignados = Consiga::where('estado', 'Pendiente')->get();
            return view('home', compact('CantidadUsuarios','UltimoUsuarioRegistrado','Transacciones','ProductosNConsignados'));
        }
        elseif(auth()->user()->rol == 'Vendedor'){
            //llevar a contador
            return redirect('/');
        }
       }
       
    }
    public function manejarinicio(){
        if(auth()->check() != true){
            return view('home');
        }

         elseif(auth()->user()->rol == 'Cliente'){
            return redirect('/');
         }
         elseif(auth()->user()->rol == 'Contador'){
             //llevar a contador
             return redirect('/');
         }
         elseif(auth()->user()->rol == 'Encargado'){
             return redirect('/');
         }
         elseif(auth()->user()->rol == 'Supervisor'){
             $Usuarios = User::all();
             $CantidadUsuarios = count($Usuarios);
             $UltimoUsuarioRegistrado = User::latest()->first();
             $Transacciones = Transaccion::all();
 
             $ProductosNConsignados = Consiga::where('estado', 'Pendiente')->get();
             return view('home', compact('CantidadUsuarios','UltimoUsuarioRegistrado','Transacciones','ProductosNConsignados'));
         }
         elseif(auth()->user()->rol == 'Vendedor'){
             //llevar a contador
             return redirect('/');
         }
        }
        
     
    public function destroy(){

        auth()-> logout();
        return redirect()->to('/');
    }
}
