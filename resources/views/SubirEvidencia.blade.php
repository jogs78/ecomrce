@extends('layouts.app')

@section('contenido')
    <div class="container">
        
        <h4>Producto: {{ $producto->nombre }}</h4>
        <h4>Precio: {{ $producto->precio }}</h4>
        
        <form action="{{ route('guardarEvidencia',$producto->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="{{ $producto->stock }}">
            </div>

            <div class="form-group">
                <label for="evidencia">Evidencia (Voucher Bancario)</label>
                <input type="file" class="form-control-file" id="evidencia" name="evidencia">
            </div>

            <div class="form-group">
                <label for="calificacion">Calificación</label>
                <select class="form-control" id="calificacion" name="calificacion">
                    <option value="1">1 - Muy malo</option>
                    <option value="2">2 - Malo</option>
                    <option value="3">3 - Regular</option>
                    <option value="4">4 - Bueno</option>
                    <option value="5">5 - Excelente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Evidencia y Calificación</button>
        </form>
    </div>
@endsection

