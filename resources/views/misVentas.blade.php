@extends('layouts.app')

@section('contenido')
<br><br><br><br>
<div class="container">
    <h1>PRODUCTOS VENDIDOS</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Id Producto</th>
                <th>Nombre del Producto</th>
                <th>Descripcion del producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transacciones as $transa)
                <tr>
                    <td>{{ $transa->idProducto }}</td>
                    <td>{{ $transa->producto->nombre }}</td>
                    <td>{{ $transa->producto->descripcion}}</td>
                    <td>{{ $transa->cantidad}}</td>
                    <td>{{ $transa->precio }}</td>
                    <td>{{ $transa->estado }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br><br><br>


    
@endsection