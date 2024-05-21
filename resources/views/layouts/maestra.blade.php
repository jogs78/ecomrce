<!DOCTYPE html>
<html lang="es">
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
    @guest
        BIENVENIDO si deseas <a href="{{route('entrar')}}">entrar</a> 
    @else
    <div class="encabezado" style="align-content:flex-start">
        ENCABEZADO A PARA TODO EL SITIO
        <br>
        <div style="text-align: right" > 
            
            {{Auth::user()->nombre}} {{Auth::user()->apellido_paterno}} {{Auth::user()->apellido_materno}} 
            <a href="{{route('salida')}}">SALIR</a>
        </div>
    </div>
    <div class="cuerpo">
        
        <div class="menu">
            @switch(Auth::user()->rol)
                @case('Cliente')
                    opciones del cliente
                    @break
                @case('Encargado')
                    opciones del Encargado                    
                    @break
                @default
                    sin opciones            
            @endswitch            
            <a href="{{route('productos.index')}}">PRODUCTOS</a>
        </div>
        <div class="contenido">
            @yield('contenido')
        </div>
    @endguest
    </div>
</body>
</html>