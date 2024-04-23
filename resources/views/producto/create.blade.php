@extends('layouts.maestra')
@section('contenido')

 <form action="{{route('productos.store')}}" method="post">
  @csrf
  <label for='nombre'>nombre</label>
  <input type='text' name='nombre' id='nombre'><br>
  <label for='nombre'>estado</label>
  <input type='text' name='estado' id='estado'><br>
  <label for='fecha_publicacion'>fecha_publicacion</label>
  <input type='text' name='fecha_publicacion' id='fecha_publicacion'><br>
  <label for='motivo'>motivo</label>
  <input type='text' name='motivo' id='motivo'><br>
  <label for='descripcion'>descripcion</label>
  <input type='text' name='descripcion' id='descripcion'><br>
  <label for='cantidad'>cantidad</label>
  <input type='text' name='cantidad' id='cantidad'>
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