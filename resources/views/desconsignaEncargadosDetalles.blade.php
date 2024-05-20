@extends('layouts.app')

@section('contenido')
    <div class="container">
        <br><br>
        <h1>Editar Consigna</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>Id : {{$consigna->id}}</p>
        <p>Producto Id: {{$consigna->producto->id}} </p>
        <p>Descripcion: {{$consigna->producto->descripcion}} </p>
        <p>Publicado Por: {{$consigna->producto->user->name}}</p>
        <p>Alta en: {{$consigna->producto->user->updated_at}}</p>
        <p>

            <form action="{{ route('Desconsignar', $consigna->producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de desconsignar este producto?')">Desconsignar</button>
            </form>
    </div>
@endsection
