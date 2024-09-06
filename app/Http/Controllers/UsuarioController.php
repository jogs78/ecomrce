<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) //listar
    {
        $usuarios = Usuario::all();
     
        if($request->expectsJson())
            return $usuarios->toJson();
        else
            return view('listado',compact('usuarios'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) //crear 1
    {
        return view('crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {

        $valores = $request->all();
        $c = ['primero'=>'hugo','segundo'=>'paco','tercero'=>'luis'];
        dump($valores);
        $nuevo = new Usuario();
        $nuevo->nombre = $valores['nombre'];
        $nuevo->apellido_paterno = $valores['apellido_paterno'];
        $nuevo->apellido_materno = $valores['apellido_materno'];
        $nuevo->genero = $valores['genero'];
        $nuevo->correo = $valores['correo'];
        $nuevo->save();
        return redirect(route('lista'));
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        if( is_null(Auth::user()) ){
            echo "primero debes iniciar";
        }else{
            echo "nombre:" . $usuario->nombre . "<br>";
            echo "apellido_paterno:" . $usuario->apellido_paterno . "<br>";
            echo "apellido_materno:" . $usuario->apellido_materno . "<br>";
            echo "genero:" . $usuario->genero . "<br>";    

        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('editar',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $valores = $request->all();
        dump($valores);
        $usuario->fill($valores);
        $usuario->save();
        return redirect(route('lista'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        echo "borrar a $usuario->nombre";
        $usuario->delete();
        return redirect(route('lista'));
    }
}
