@foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->categoria->nombre }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>{{ $producto->precio }}</td>
        <td>
            <ul>
                @foreach ($producto->consignas as $consigna)
                    <li>
                        {{ $consigna->estado }}
                        {{ $consigna->mensaje }}
                    </li>
                @endforeach
            </ul>
        </td>
        <td>
            @if ($producto->consignas->where('estado', 'Aceptado')->isEmpty())
                <form action="{{ route('eliminarProducto', $producto->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            @endif
        </td>
    </tr>
@endforeach
