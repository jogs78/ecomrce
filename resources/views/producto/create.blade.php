@extends('layouts.maestra')
@section('contenido')

<form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for='nombre'>Nombre</label>
    <input type='text' name='nombre' id='nombre'><br>
    
    <label for='estado'>Estado</label>
    <input type='text' name='estado' id='estado'><br>
    
    <label for='fecha_publicacion'>Fecha de Publicación</label>
    <input type='date' name='fecha_publicacion' id='fecha_publicacion' value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"><br>
    
    <label for='motivo'>Motivo</label>
    <input type='text' name='motivo' id='motivo'><br>
    
    <label for='descripcion'>Descripción</label>
    <input type='text' name='descripcion' id='descripcion'><br>
    
    <label for='cantidad'>Cantidad</label>
    <input type='text' name='cantidad' id='cantidad'><br>
    
    <label for='categoria_id'>Categoría</label>
    <select name="categoria_id" id="categoria_id">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select><br>
    
    <label for='imagen'>Imagen</label>
    <input type='file' name='imagen' id='imagen'><br>
    
    <input type="submit" value="ENVIAR">
</form>

@endsection
