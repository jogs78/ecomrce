@extends('layouts.maestra')
@section('contenido')

 <form action="{{route('productos.update',$producto->id )}}" method="post">
  @csrf
  @method('PUT')
  <label for='nombre'>nombre</label>
  <input type='text' name='nombre' id='nombre' value="{{$producto->nombre}}"><br>
  <label for='nombre'>estado</label>
  <input type='text' name='estado' id='estado' value="{{$producto->estado}}"><br>
  <label for='fecha_publicacion'>fecha_publicacion</label>
  <input type='text' name='fecha_publicacion' id='fecha_publicacion' value="{{$producto->fecha_publicacion}}"><br>
  <label for='motivo'>motivo</label>
  <input type='text' name='motivo' id='motivo' value="{{$producto->motivo}}"><br>
  <label for='descripcion'>descripcion</label>
  <input type='text' name='descripcion' id='descripcion' value="{{$producto->descripcion}}"><br>
  <label for='cantidad'>cantidad</label>
  <input type='text' name='cantidad' id='cantidad' value="{{$producto->cantidad}}">
  <br>
  categoria:
  <select name="categoria_id" id="">
   @foreach ($categorias as $categoria)
     <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>       
   @endforeach
  </select>
  <input type="submit" value="ENVIAR">
 </form>

@endsection