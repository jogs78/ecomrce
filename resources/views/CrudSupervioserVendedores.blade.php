@extends('layouts.app')
@section('contenido')
<div class="container">
    <br><br>
<h1>Listado de Vendedores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Alta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @if($usuario->rol == 'Vendedor')
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol}}</td>
                    <td>{{ $usuario->created_at}}</td>
                    <td><a href={{route('DetalleVendedores', $usuario->id)}}class="btn btn-primary">Ver Detalles</a></td>
                    
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection