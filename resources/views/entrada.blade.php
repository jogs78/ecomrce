<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .encabezado {
            background-color: rgb(145, 202, 221);
            display: block;
            height: 100px;
        }
        .cuerpo{
            grid-template-columns: 20% 80% ;
            display: grid;
            height: 2000px;
        }        
        .menu {
            background-color: rgb(230, 173, 187);
        }
        .contenido {
            background-color: rgb(173, 230, 199);
        }
    </style>        
</head>
<body>
    <div class="encabezado">
        ENCABEZADO A PARA TODO EL SITIO
    </div>
    <div class="cuerpo">
      <form action="validar" method="post">
        @csrf
        Usuario: <input type="text" name="nombre" id=""><br>
        Clave: <input type="text" name="clave" id=""><br>
        <input type="submit" value="Validar">
       </form>
       
      
    </div>
</body>
</html>
