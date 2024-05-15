<?php

namespace App\Http\Controllers;

use App\Models\Consiga;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConsigaRequest;
use App\Http\Requests\UpdateConsigaRequest;

class ConsigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsigaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Consiga $consiga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consiga $consiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsigaRequest $request, Consiga $consiga)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consiga $consiga)
    {
        //
    }

    public function consignasEncargadoProducto($id){

        $consigna = Consiga::findOrFail($id);
        return view('consignadetalles',compact('consigna'));
        
    }

    public function actualizar(Request $request, $id){
        
        $consigna = Consiga::findOrFail($id);
        
        $consigna->estado = $request->estado;
        $consigna->idEncargado = auth()->user()->id;
        $consigna->mensaje = $request->estado == 'Rechazado' ? $request->mensaje : null;
        $consigna->save();
    
        $consignas = Consiga::where('estado','Pendiente')->get();
        return view('consignasEncargados', compact('consignas'));
    }

    public function desconsignasEncargadoProducto($id){

        $consigna = Consiga::findOrFail($id);
        return view('desconsignaEncargadosDetalles',compact('consigna'));
        
    }

    public function actualizarDesconsignas(Request $request, $id){
        $consigna = Consiga::findOrFail($id);
    
        // Actualizar el estado y el mensaje si corresponde
        $consigna->estado = 'Rechazado';
        $consigna->idEncargado = auth()->user()->id;
        $consigna->mensaje = $request->mensaje; // Esto puede ser null si no se envía un mensaje en el formulario
    
        $productoId = $consigna->idProducto;
    
        // Obtener y eliminar las preguntas asociadas al producto
        $producto = Producto::findOrFail($productoId);
        $preguntas = $producto->preguntas;
        foreach ($preguntas as $pregunta) {
            $pregunta->respuestas()->delete(); // Eliminar las respuestas asociadas a cada pregunta
            $pregunta->delete(); // Eliminar la pregunta
        }
    
        // Guardar los cambios en la consigna y el producto
        $consigna->save();
        $producto->save();
    
        // Obtener las consignas pendientes después de la actualización
        $consignas = Consiga::where('estado', 'Aceptado')
        ->whereDoesntHave('producto.transacciones', function ($query) {
            $query->where('estado', 'Aceptado');
        })
        ->get();
    
        return view('consignasEncargados', compact('consignas'));
    }
    

    
}
