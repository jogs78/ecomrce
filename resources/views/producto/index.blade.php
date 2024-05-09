@extends('layouts.maestra')
@section('contenido')

<table border="1"><thead>
  <tr>
   <th>Nombre</th>
   <th>Descripcion</th>
   <th>Acciones</th>
 
  </tr>
 </thead>
 @forelse ($encontrados as $encontrado)
 <tr>
  <td><a href="{{route('productos.show',$encontrado->id)}}">{{$encontrado->nombre}}</a></td>
  <td>{{$encontrado->descripcion}}</td>
  <td> 
    @can('update', $encontrado)
      <a href="{{route('productos.edit',$encontrado->id)}}">EDITAR</a>
    @endcan
 
    @can('delete', $encontrado)
      <form action="{{route('productos.destroy',$encontrado->id)}}" method="post">
        @method('DELETE')
        @csrf
        <input type="submit" value="BORRAR">
      </form>
    @endcan

    @can('comprar', $encontrado)
      <a href="{{route('productos.comprar',$encontrado->id )}}">COMPRAR</a>
    @endcan




  </td>
 </tr>
 @empty
 <tr>
  <td colspan="3">SIN PRODUCTOS</td>
 </tr>
     
 @endforelse
 
 </table>
 

@can('create', App\Models\Producto::class)
  <a href="{{route('productos.create')}}">NUEVO PRODUCTO</a>    
@endcan


 
@endsection