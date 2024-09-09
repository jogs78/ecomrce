@extends('layouts.maestra')
@section('contenido')
<h1>Subir Imagen para Producto</h1>
    
<form action="/subir-imagen" method="POST" enctype="multipart/form-data">
    <!-- Campo oculto para el ID del producto -->
    <input type="hidden" name="producto_id" value="123"> <!-- Aquí se establece el ID del producto dinámicamente -->
        
    <!-- Información del producto -->
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" id="nombre" name="nombre" value="Producto Ejemplo" readonly><br><br>
        
    <label for="descripcion">Descripción del Producto:</label>
    <textarea id="descripcion" name="descripcion" readonly>Descripción del producto aquí</textarea><br><br>
        
    <!-- Campo para seleccionar la imagen -->
    <label for="imagen">Seleccionar Imagen:</label>
     <input type="file" id="imagen" name="imagen" accept="image/*" required><br><br>
        
    <input type="submit" value="Subir Imagen">
</form>

@endsection