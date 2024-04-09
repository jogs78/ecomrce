@if ( is_null(Auth::user()) )
  primero debes iniciar    
@else
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 LISTADO DE USUARIOS
 <ul>
<?php
 for ($i=0; $i < 10 ; $i++) { 
   echo "<li> Usuario " . $i+1 . "</li>";
 }
?>
 </ul>
<hr>
<ul>
@for ($i = 0; $i < 10; $i++)
    <li> Usuario {{$i+1}} </li>
@endfor
 </ul>
 <hr>
 <ul>
 @foreach ($usuarios as $elemento)
  <li> Usuario {{$elemento->nombre}}, {{$elemento->apellido_paterno}} {{$elemento->apellido_materno}} </li>
 @endforeach
 <ul> 
<hr>

<table border="1">
  <thead>
    <th>#</th>
    <th>Nombre</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    @forelse ($usuarios as $elemento)
        <tr>
          <td> {{$loop->iteration}} </td>
          <td> {{$elemento->nombre}}, {{$elemento->apellido_paterno}} {{$elemento->apellido_materno}}</td>
          <td> 
            <a href="{{route('mostrar',$elemento->id)}}">mostrar</a>  
            <a href="{{route('editar',$elemento->id)}}">editar</a>  
            <form action="{{route('destruir',$elemento->id)}}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" value="borrar">
            </form>

          </td>
        </tr>
    @empty
        
    @endforelse


  </tbody>
</table>
<br><br><br>

<a href="{{route('crear')}}">CREAR UN NUEVO USUARIO</a>


</body>
</html>    
@endif

