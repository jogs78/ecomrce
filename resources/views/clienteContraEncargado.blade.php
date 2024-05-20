@extends('layouts.app')
@section('contenido')
<div class="container">
    <br><br>
<h1>Listado de Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @if($usuario->rol == 'Encargado' or $usuario->rol == 'Cliente' or $usuario->rol == 'Contador')
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol}}</td>
                    <td>
                        <a href="{{ route('EditUsuario', $usuario->id) }}" class="btn btn-primary">Editar/Restablecer Contraseña</a>
                        
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection