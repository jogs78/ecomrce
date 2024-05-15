@extends('layouts.app')
@section('contenido')
<div class="container">
    <br><br>
<h1>Listado de Transacciones</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Comprador</th>
                <th>Voucher</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transacciones as $transaccion)
                <tr>
                    <td>{{ $transaccion->id}}</td>
                    <td>{{ $transaccion->producto->nombre}}</td>
                    <td>{{ $transaccion->cantidad }}</td>
                    <td>{{ $transaccion->precio}}</td>
                    <td>{{ $transaccion->usuario->name}}</td>
                    <td>{{ $transaccion->voucher}}</td>
                    <td>{{ $transaccion->estado}}</td>
                    <td><a href={{route('mostrarTransaccionesDetalles',$transaccion->id)}} class="btn btn-primary">Ver Detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection