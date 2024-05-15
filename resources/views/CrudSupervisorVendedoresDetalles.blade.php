@extends('layouts.app')

@section('contenido')
<div class="container">
    <br><br><br>
    <h1>Detalles del Vendedor</h1>
    <div class="card">
        <div class="card-header">
            Información del Vendedor
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>ID : {{$vendedor->id}}</p>
                    <p>Nombre: {{ $vendedor->name }}</p>
                    <p>Apellido Paterno: {{ $vendedor->apellido_paterno }}</p>
                    <p>Apellido Materno: {{ $vendedor->apellido_materno }}</p>
                    <p>Fecha de Nacimiento: {{ $vendedor->fecha_nacimiento }}</p>
                    <p>Teléfono: {{ $vendedor->no_telefono }}</p>
                </div>
                <div class="col-md-6">
                    <p>Correo Electrónico: {{ $vendedor->email }}</p>
                    <p>Género: {{ $vendedor->sexo }}</p>
                    <p>Dirección: {{ $vendedor->direccion }}</p>
                    <p>Rol: {{ $vendedor->rol }}</p>
                    <p>Dado de Alta: {{ $vendedor->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br><br>
<h1>Total de Articulos Vendidos {{$cantidadProductosEnVenta}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Alta</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($productos as $producto)
            @if($producto->idUser == $vendedor->id)
            
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->created_at}}</td>
                </tr>
                <?php $i++; ?>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<br>

<div class="container">
    <br><br>
<h1>Transacciones Realizadas:  {{$cantidadTransacciones}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>ID Producto</th>
                <th>Producto</th>
                <th>Id de Usuario</th>
                <th>Usuario</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Alta</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($transa as $transas)
            @if($transas->estado == 'Aceptado')
            <tr>
                <td>{{ $i }}</td>
                <td>{{$transas->id}}</td>
                <td>{{$transas->producto->id}}</td>
                <td>{{$transas->producto->nombre}}</td>
                <td>{{$transas->idUsuario}}</td>
                <td>{{$transas->usuario->name}}</td>
                <td>{{$transas->precio}}</td>
                <td>{{$transas->estado}}</td>
                <td>{{$transas->updated_at}}</td>
                <?php $i++; ?>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
