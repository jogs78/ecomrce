@extends('layouts.app')
@section('contenido')


<body>
    <div class="container">
        <h1>Productos de la Categoría {{ $categoria->nombre }}</h1>


        <!-- Formulario de búsqueda -->
        <form action="{{ route('ProductosCategoriaSupervisor', $categoria->id) }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar producto..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Confirmado</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                @if($producto->estado == 'Aceptado')
                    <tr>
                        <td>{{ $producto->producto->nombre }}</td>
                        <td>{{ $producto->producto->descripcion }}</td>
                        <td>{{ $producto->producto->stock }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>{{ $producto->producto->user->name }}</td>
                        <td>
                            <a href="{{ route('Kardex', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


@endsection