<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use App\Models\Transaccion;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\User;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::join('transaccions', 'pagos.idTransaccion', '=', 'transaccions.id')
        ->select('pagos.idPago', DB::raw('MAX(pagos.estado) as estado'),
                    DB::raw('MAX(pagos.idUsuario) as idUsuario'),
                    DB::raw('SUM(transaccions.precio) as total_precio'))
        ->groupBy('pagos.idPago')
        ->get();
        return view('contadorListaPago',compact('pagos'));
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
    public function store(StorePagoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        //
    }
    public function detalles($id){

        $PagoDetalle = Pago::where('idPago',$id)->get();

        return view('contadorDetallarPago',compact('PagoDetalle'));
    }

    public function actualizardetalles($id){
        $Pagos = Pago::where('idPago',$id)->get();

        foreach ($Pagos as $pago){
            $pago->estado = 'entregado';
            $pago->save();
        }

        return redirect(route('ListarPagos'));
    }

    public function magia($id){
        $productosUsuario = Producto::where('idUser', $id)->whereHas('transacciones', function ($query) {
            $query->where('estado', 'Aceptado')->whereNotIn('id', function ($subquery) {
                    $subquery->select('idTransaccion')
                        ->from('pagos');
                });
        })
        ->get();

        // Obtener el último ID de la tabla pagos si existen registros
        $ultimoIdPago = Pago::orderBy('idPago', 'desc')->value('idPago');

        // Verificar si hay registros en la tabla pagos
        if ($ultimoIdPago !== null) {
            // Si hay registros, asignar el nuevo ID como el último ID + 1
            $nuevoIdPago = $ultimoIdPago + 1;
        } else {
            // Si la tabla está vacía, asignar el nuevo ID como 1
            $nuevoIdPago = 1;
        }

        foreach($productosUsuario as $producto){
            // Obtener las transacciones Aceptadas y no pagadas para este producto
            $transacciones = $producto->transacciones()->where('estado', 'Aceptado')->whereNotIn('id', function ($query) {
                $query->select('idTransaccion')->from('pagos');
            })->get();
        
            // Crear un nuevo pago para cada transacción
            foreach($transacciones as $transaccion){
                $nuevoPago = new Pago();
                $nuevoPago->idPago = $nuevoIdPago; // Asignar el mismo idPago a todas las transacciones
                $nuevoPago->idTransaccion = $transaccion->id; 
                $nuevoPago->estado = 'Pendiente';// Asignar el id de la transacción
                $nuevoPago->idUsuario = auth()->user()->id;
                $nuevoPago->save(); // Guardar el nuevo pago en la base de datos
            }
        }

        $usuarios = User::all();
        session()->flash('success', 'El pago se ha registrado correctamente.');
    return redirect()->back();
    }

    

}
