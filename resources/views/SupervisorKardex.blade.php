@extends('layouts.app')

@section('contenido')

<br><br>

<div class="container">
    <br><br><br>
    <h1>Detalles del Producto</h1>
    <div class="card">
        <div class="card-header">
            Detalles
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>ID: {{ $producto->id }}</p>
                    <p>Nombre: {{ $producto->nombre }}</p>
                    <p>Categoría: {{ $producto->categoria->nombre }}</p>
                    <p>Descripción: {{ $producto->descripcion }}</p>
                </div>
                <div class="col-md-6">
                    <p>Propietario: {{ $producto->user->name }}</p>
                    <p>Alta: {{ $producto->created_at }}</p>
                    <p>Estado: {{ $consigna->estado}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <br><br><br>
    
        
    <h1>Interesados</h1>     
    <br><br>
                @if($preguntasConRespuestas->isEmpty())
                    <p> No se cuentan con preguntas relacionadas con este producto</p>
                @else
                    <p>Preguntas:</p>
                    @foreach($preguntasConRespuestas as $pregunta)
                        <p>{{ $pregunta->contenido }} ------> Hecha por {{$pregunta->user->name}}</p>
                        <ul>
                            @foreach($pregunta->respuestas as $respuesta)
                                <li>{{ $respuesta->contenido }}</li>
                            @endforeach
                        </ul>
                    @endforeach  
                
                @endif
            
        <br><br><br>
    </div>
</div>


<div class="container">
    <br><br>
<h1>Transacciones Realizadas</h1>
<br>
        @if($transas->isEmpty())
                <p> No se ha comprado este Producto </p>
        @else
    <table class="table">
        
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Usuario</th>
                
                <th>Alta</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($transas as $transas)
            @if($transas->idProducto == $producto->id  && $transas->estado == 'Aceptado')
            <tr>
                <td>{{$i}}</td>
                <td>{{$transas->id}}</td>
                <td>{{$transas->producto->nombre}}</td>
                <td>{{$transas->producto->descripcion}}</td>
                <td>{{$transas->cantidad}}</td>
                <td>{{$transas->precio}}</td>
                <td>{{$transas->usuario->name}}</td>
                
                <td>{{$transas->created_at}}</td>
                <?php $i++; ?>
            </tr>
            @endif
            @endforeach
            
        </tbody>
    </table>
    @endif
</div>

<br><br><br>

@endsection
