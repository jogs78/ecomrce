@extends('layouts.app')

@section('contenido')
    <div class="container">
    <br><br>
    <h1>Detalles del pago</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pago</th>
                <th>ID Producto</th>
                <th>Nombre Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @foreach ($PagoDetalle as $item)
            <tr>
                <td>{{$item->idPago}}</td>
                <td>{{$item->transaccion->idProducto}}</td>
                <td>{{$item->transaccion->producto->nombre}}</td>
                <td>{{$item->transaccion->cantidad}}</td>
                <td>{{$item->transaccion->precio}}</td>
                <td>{{$item->transaccion->producto->user->name}}</td>
            </tr>
            <br><br>
            @php
            $ide = $item->idPago;
            $estado = $item->estado;
            $total += $item->transaccion->precio;
            @endphp
            @endforeach
        </tbody>
    </table>
    <h1>Total: {{$total}}</h1>
    <br><br><br>
    @if($estado == 'pendiente')
    <form action={{ route('ActualizarPago', $ide) }} method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Entregar</button>
    </form>
    @endif
    </div>
    
@endsection