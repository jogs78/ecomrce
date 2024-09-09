@extends('layouts.maestra')
@section('contenido')

<form action="{{ route('productos.update', $producto->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for='nombre'>Nombre</label>
    <input type='text' name='nombre' id='nombre' value="{{ $producto->nombre }}"><br>
    
    <label for='estado'>Estado</label>
    <input type='text' name='estado' id='estado' value="{{ $producto->estado }}"><br>
    
    <label for='fecha_publicacion'>Fecha de Publicación</label>
    <input type='date' name='fecha_publicacion' id='fecha_publicacion' value="{{ $producto->fecha_publicacion }}"><br>
    
    <label for='motivo'>Motivo</label>
    <input type='text' name='motivo' id='motivo' value="{{ $producto->motivo }}"><br>
    
    <label for='descripcion'>Descripción</label>
    <input type='text' name='descripcion' id='descripcion' value="{{ $producto->descripcion }}"><br>
    
    <label for='cantidad'>Cantidad</label>
    <input type='text' name='cantidad' id='cantidad' value="{{ $producto->cantidad }}"><br>
    
    <label for='categoria_id'>Categoría</label>
    <select name="categoria_id" id="categoria_id">
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select><br>
    
    <!-- Mostrar la imagen actual -->
    @if($producto->imagen)
        <div>
            <label>Imagen Actual</label><br>
            <img src="{{ asset('storage/productos/' . $producto->imagen) }}" alt="Imagen de {{ $producto->nombre }}" width="100"><br>
        </div>
    @else
        <p>Sin imagen</p>
    @endif
    
    <label for='imagen'>Imagen (dejar en blanco para no cambiarla)</label>
    <input type='file' name='imagen' id='imagen'><br>
    
    <input type="submit" value="Actualizar">
</form>

@endsection
