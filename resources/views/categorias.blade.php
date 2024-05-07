<!-- categorias.blade.php -->
<div class="container">
    <h1>Listado de Categorías</h1>
    <div class="list-group">
        @foreach($categorias as $categoria)
            <a href="{{ route('productosPorCategoria', $categoria->id) }}" class="list-group-item list-group-item-action">{{ $categoria->nombre }}</a>
        @endforeach
    </div>
</div>
