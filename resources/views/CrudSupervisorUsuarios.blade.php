@extends('layouts.app')
@section('contenido')
<div class="container">
    <br><br>
<h1>Listado de Usuarios</h1>
    <a href="{{ route('CreateUsuario') }}" class="btn btn-primary mb-3">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('EditUsuario', $usuario->id) }}" class="btn btn-primary">Editar/Restablecer Contraseña</a>
                        <form action="{{ route('DestroyUsuario', $usuario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection