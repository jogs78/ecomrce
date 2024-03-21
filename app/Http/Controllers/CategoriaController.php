<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categorias=Categoria::all();
        if( $request->expectsJson() )
            return response()->json($categorias);
        else
            return view('categoria.listar',compact('categorias'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        $nueva = new Categoria;
        $nueva->fill($request->all());
        $nueva->save();

        if( $request->expectsJson() ){
            return response()->json($nueva->toArray(), 201, ["Cache-Control"=>"no-cache"]);
        }else{
            return redirect(route('categorias.index'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria, Request $request)
    {

        if( $request->expectsJson() ){
            $datos = [
                'nombre' => $categoria->nombre,
                'cuantos' => 5,
            ];
            return response()->json($datos);
        }else{
            echo "Mostrando $categoria->nombre";
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.editar',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->fill($request->all());
        $categoria->save();
        if ($request->expectsJson())
            return response()->json($categoria->toArray());
        else

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria, Request $request)
    {

        $categoria->delete();
        if ($request->expectsJson()){
            $respuesta=
            [
                "realizado" => "si"
            ];
            return response()->json($respuesta);
        }
        else
        return redirect(route('categorias.index'));
    }
}
