<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PuertaController extends Controller
{
    public function entrada(Request $request){
      return view('entrada');

    }
    public function salida(){
        $pagina = <<<PAGINA
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" />
 <title>title</title>
</head>
<body>
  vuelve pronto
</body>
</html>
PAGINA;
        echo $pagina;
    }

    public function valida(Request $request){
      $nombre_usuario =  $request->input('nombre');
      $clave_escrita  = $request->input('clave');
      //echo "revisaremos los datos si el usuario $nombre_usuario tiene $clave_escrita por clave";
      $encontrado = Usuario::where('correo', $nombre_usuario)->first();
      if( is_null($encontrado) ){
        if ($request->expectsJson()){
          return response()->json(['error'=>'Usuario no existe'] );
         }else{
          echo " USUARIO no existe. ";
         }

      } 
      else{
        if(Hash::check($clave_escrita,$encontrado->clave)){

        $token = Str::random();
        $encontrado->token = $token ;
        $encontrado->save();


         if ($request->expectsJson()){
          return response()->json($encontrado );
         }else{
          Auth::login($encontrado);
          return view('layouts.principalcliente');

          return redirect('/');
         }

        }else{
          if ($request->expectsJson()){
            return response()->json(['error'=>'Credenciales incorrectas'] );
           }else{
            echo "Credenciales incorrectas";
          }
  
        }

        }
    }
}
