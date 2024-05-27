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
        <p>Publicado en: {{$consigna->producto->user->created_at}}</p>
        <p>
            

        <form action={{route('Updateconsigna',$consigna->producto->id)}} method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado" required onchange="toggleMensajeField()">
                    <option value="Rechazado" {{ $consigna->estado === 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                    <option value="Pendiente" {{ $consigna->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Aceptado" {{ $consigna->estado === 'Aceptado' ? 'selected' : '' }}>Aceptado</option>
                </select>
            </div>
            <div class="form-group" id="mensajeField" style="display: none;">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje"></textarea>
            </div>
            
            <script>
                function toggleMensajeField() {
                    var estadoSelect = document.getElementById('estado');
                    var mensajeField = document.getElementById('mensajeField');
                    var mensaje = document.getElementById('mensaje');

                    console.log('Estado seleccionado:', estadoSelect.value); // Verifica el valor seleccionado en la consola

                    if (estadoSelect.value === 'Rechazado') {
                        mensajeField.style.display = 'block';
                    } else {
                        mensaje.value = '';
                        mensajeField.style.display = 'none';
                    }
                }
                
                // Llama a toggleMensajeField al cargar la página para asegurarte de que el campo de mensaje esté configurado correctamente
                window.onload = toggleMensajeField;
            </script>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
