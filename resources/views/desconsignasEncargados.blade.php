@extends('layouts.app')

@section('contenido')
    <br><br><br><br>
    <div class="container">
        <h1>PRODUCTOS CONSIGNADOS</h1>
        <h3>Que no se han comprado</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre del Producto</th>
                    <th>Descripcion del producto</th>
                    <th>Stock</th>
                    <th>Publicado</th>
                    <th>ALTA</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consignas as $consigna)
                    <tr>
                        <td>{{ $consigna->producto->id }}</td>
                        <td>{{ $consigna->producto->nombre }}</td>
                        <td>{{ $consigna->producto->descripcion}}</td>
                        <td>{{ $consigna->producto->stock}}</td>
                        <td>{{ $consigna->producto->user->name }}</td>
                        <td>{{ $consigna->producto->updated_at }}</td>
                        <td>
                            <a href={{route('desconsignarProducto',$consigna->id)}} class="btn btn-primary">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br><br><br><br>
@endsection