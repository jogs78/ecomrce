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
        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        echo "Mostrando $categoria->nombre";
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
        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect(route('categorias.index'));
    }
}
