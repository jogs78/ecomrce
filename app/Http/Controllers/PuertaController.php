<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuertaController extends Controller
{
    public function entrada(){
        $pagina = <<<PAGINA
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" />
 <title>title</title>
</head>
<body>
  <form action="validar" method="post">
   Usuario: <input type="text" name="nombre" id=""><br>
   Clave: <input type="text" name="clave" id=""><br>
   <input type="submit" value="Validar">
  </form>
</body>
</html>
PAGINA;
        echo $pagina;
    }
    public function salida(){
        $pagina = <<<PAGINA
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" />
 <title>title</title>
</head>
<body>
  vuelve pronto
</body>
</html>
PAGINA;
        echo $pagina;
    }

    public function valida(){
        echo "revisaremos los datos";
    }
}
