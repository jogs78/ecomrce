@extends('layouts.app')
@section('contenido')
<div class="container">
    <br><br>
<h1>Escoge el vendedor para generar el pago</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo Electronico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($usuarios == null){
                <p> No hay Pagos por crear</p>
            }
            @else
            @foreach ($usuarios as $usuario)
            
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->apellido_paterno }} {{$usuario->apellido_materno}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>
                        <a href={{route('vamosahacermagia',$usuario->id)}} class="btn btn-primary">Generar Pago</a>
                    </td>
                </tr>
            
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection