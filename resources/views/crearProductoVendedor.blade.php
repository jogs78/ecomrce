@extends('layouts.app')
@section('contenido')
    
<div class="container">
    <br><br><br><br>
<form action="{{ route('guardarProducto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="idCategoria">Categoría</label>
        <select class="form-control" id="idCategoria" name="idCategoria" required>
            <option value="">Selecciona una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="fotos">Fotos</label>
        <input type="file" class="form-control-file" id="fotos" name="fotos[]" multiple accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear Producto</button>
</form>
</div>

@endsection