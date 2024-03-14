<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Document</title>
</head>
<body>
 formulario para crar usuarios
 <form action="{{route('alta')}}" method="POST" enctype="application/x-www-form-urlencoded" >
  @csrf
  <label for='nombre_id'>Nombre</label>
  <input type='text' name='nombre' id='nombre_id'><br>

  <label for='xyz'>apellido_paterno</label>
  <input type='text' name='apellido_paterno' id='xyz'><br>

  <label for='otro'>apellido_materno</label>
  <input type='text' name='apellido_materno' id='otro'><br>

  <label for='lista'>genero</label>
  <select name="genero" id="lista">
   <option value="Masculino">Hombre</option>
   <option value="Femenino">Mujer</option>
  </select>

  <input type="submit" value="Enviar">
</form>

</body>
</html>