<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
           return redirect()->route('home.cliente');
        }
        elseif(auth()->user()->rol == 'Contador'){
            //llevar a contador
            return redirect()->route('home.contador');
        }
        elseif(auth()->user()->rol == 'Encargado'){
            return redirect()->route('home.encargado');
        }
        elseif(auth()->user()->rol == 'Supervisor'){
            //llevar a contador
            return redirect()->route('home.supervisor');
        }
        elseif(auth()->user()->rol == 'Vendedor'){
            //llevar a contador
            return redirect()->route('home.vendedor');
        }
       }
       
    }

    public function destroy(){

        auth()-> logout();
        return redirect()->to('/');
    }
}
