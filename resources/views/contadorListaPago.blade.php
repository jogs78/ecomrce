@extends('layouts.app')


@section('contenido')
<div class="container">
    <br><br>
<h1>Listado de Transacciones</h1>

<br>
<h2>Transacciones Pendientes</h2>
<table class="table">
    <thead>
        <tr>
            <th>Id de Pago</th>
            <th>Id de Usuario</th>
            <th>Estado</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pagos as $pago)
        @if($pago->estado == 'pendiente')
            <tr>
                <td>{{ $pago->idPago }}</td>
                <td>{{ $pago->idUsuario }}</td>
                <td>{{ $pago->estado }}</td>
                <td>${{ $pago->total_precio }}</td>
                <td><a href={{route('DetallarPago',$pago->idPago)}} class="btn btn-primary">Ver Detalles</a></td>
                
            </tr>
        @endif
        @endforeach
    </tbody>
</table>


<br><br><br>
<h2>Transacciones Completadas</h2>

<table class="table">
    <thead>
        <tr>
            <th>Id de Pago</th>
            <th>Id de Usuario</th>
            <th>Estado</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pagos as $pago)
        @if($pago->estado == 'entregado')
            <tr>
                <td>{{ $pago->idPago }}</td>
                <td>{{ $pago->idUsuario }}</td>
                <td>{{ $pago->estado }}</td>
                <td>${{ $pago->total_precio }}</td>
                <td><a href={{route('DetallarPago',$pago->idPago)}} class="btn btn-primary">Ver Detalles</a></td>
            </tr>
        @endif
        @endforeach
    </tbody>
</table>

</div>
@endsection