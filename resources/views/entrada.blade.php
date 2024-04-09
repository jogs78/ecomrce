<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" />
 <title>title</title>
</head>
<body>
  <form action="validar" method="post">
   @csrf
   Usuario: <input type="text" name="nombre" id=""><br>
   Clave: <input type="text" name="clave" id=""><br>
   <input type="submit" value="Validar">
  </form>
</body>
</html>
