<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Document</title>
</head>
<body>
 formulario para crar categorias
 <form action="{{route('categorias.store')}}" method="POST" enctype="application/x-www-form-urlencoded" >
  @csrf
  <label for='nombre_id'>Nombre</label>
  <input type='text' name='nombre' id='nombre_id'><br>

  <input type="submit" value="Enviar">
</form>

</body>
</html>