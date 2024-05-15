<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CREAR 30 SEEDER PARA PRODUCTOS CONFIRMADOS
        $categorias = Categoria::pluck('id');
        //POR SI NECESITA -> $arregloUsuarios = [];
        $contadorCategoria = 1;
        $categoriaActual = 1;
        
        $contadorConfirmados = 0;
        $contadorNoConfirmados = 0;
        $nomProductos = [
            // Electrodomésticos
            'Lavadora de Carga Frontal EcoClean',
            'Refrigerador Inteligente FrostFree',
            'Aspiradora Robotizada SmartClean Pro',
            'Licuadora Multifunción PowerBlend',
            'Horno de Microondas QuickHeat',
            'Cafetera Programable BrewMaster',
            'Plancha de Vapor EasyGlide',
            'Secadora de Ropa SmartDry',
            'Ventilador de Torre CoolBreeze',
            'Purificador de Aire CleanAir Plus',
        
            // Videojuegos
            'Consola de Videojuegos NextGen',
            'Controlador Gaming ElitePro',
            'Teclado Mecánico Gamer Xtreme',
            'Monitor de Alta Resolución GameView',
            'Auriculares Gaming SurroundSound',
            'Silla Gamer ErgoMax',
            'Mouse Óptico PrecisionPro',
            'Tarjeta Gráfica UltraRender',
            'Micrófono Profesional StreamMic',
            'Alfombrilla Gaming SpeedTrack',
        
            // Dispositivos Móviles
            'Smartphone UltraSlim 5G',
            'Tablet ProTouch con Lápiz Stylus',
            'Auriculares Bluetooth BassBoost',
            'Cargador Portátil PowerCharge',
            'Smartwatch Fitness Tracker',
            'Fundas Resistentes para Móvil',
            'Cable USB de Carga Rápida',
            'Soporte Magnético para Auto',
            'Batería Externa de Alta Capacidad',
            'Lentes de Realidad Virtual VRVision',
        
            // Computadoras y Accesorios
            'Laptop Ultraligera ProTech',
            'Impresora Multifunción PrintSmart',
            'Monitor Curvo de Gran Tamaño',
            'Teclado Inalámbrico SlimTouch',
            'Mouse Ergonómico para Oficina',
            'Cámara Web de Alta Definición',
            'Disco Duro Externo BackupDrive',
            'Mochila para Portátil TechBag',
            'Altavoces Bluetooth SoundBoost',
            'Router de Alta Velocidad NetConnect',
        
            // Electrónica de Consumo
            'TV LED 4K UltraHD VisionMax',
            'Barra de Sonido SurroundBar',
            'Proyector HD CinemaView',
            'Reproductor Blu-ray SmartPlayer',
            'Sistema de Audio Hi-Fi SoundMaster',
            'Auriculares Inalámbricos HiRes',
            'Receptor Bluetooth AudioLink',
            'Cargador Inalámbrico QuickCharge',
            'Control Remoto Universal SmartControl',
            'Luz LED Inteligente SmartLight',
        ];
        $precios = [
            // Electrodomésticos
            750, 1200, 550, 80, 150, 200, 40, 600, 80, 300,
            // Videojuegos
            500, 80, 100, 400, 150, 300, 40, 700, 80, 50,
            // Dispositivos Móviles
            1000, 300, 100, 30, 200, 20, 10, 15, 50, 100,
            // Computadoras y Accesorios
            1500, 200, 400, 50, 30, 100, 150, 50, 80, 120,
            // Electrónica de Consumo
            1200, 300, 600, 100, 500, 150, 80, 30, 40, 20,
        ];
        // Descripciones de productos
        $descripciones = [
            // Electrodomésticos
            'Lavadora de carga frontal con capacidad de 10 kg y tecnología ecoamigable.',
            'Refrigerador inteligente con control de temperatura digital y dispensador de agua.',
            'Aspiradora robotizada con mapeo inteligente y sistema de limpieza programable.',
            'Licuadora multifunción con múltiples velocidades y cuchillas de acero inoxidable.',
            'Horno de microondas con funciones automáticas de cocción y descongelado rápido.',
            'Cafetera programable con jarra térmica y sistema de preparación avanzado.',
            'Plancha de vapor con suela antiadherente y regulador de temperatura.',
            'Secadora de ropa con programas de secado rápido y protección de tejidos.',
            'Ventilador de torre con oscilación automática y temporizador programable.',
            'Purificador de aire con filtro HEPA y sistema de eliminación de olores.',
        
            // Videojuegos
            'Consola de videojuegos de última generación con gráficos de alta definición.',
            'Controlador gaming con diseño ergonómico y botones personalizables.',
            'Teclado mecánico para juegos con retroiluminación RGB y teclas programables.',
            'Monitor de alta resolución con tiempo de respuesta rápido y tecnología FreeSync.',
            'Auriculares gaming con sonido envolvente y cancelación de ruido.',
            'Silla gamer ergonómica con ajuste de altura y reposabrazos acolchados.',
            'Mouse óptico de precisión con sensor ajustable y botones programables.',
            'Tarjeta gráfica de alto rendimiento para juegos exigentes y edición de video.',
            'Micrófono profesional para streaming y comunicación clara en juegos en línea.',
            'Alfombrilla gaming con superficie de deslizamiento suave y base antideslizante.',
        
            // Dispositivos Móviles
            'Smartphone ultradelgado con conectividad 5G y pantalla AMOLED de alta resolución.',
            'Tablet con pantalla táctil de 10 pulgadas, procesador potente y lápiz stylus incluido.',
            'Auriculares inalámbricos con tecnología Bluetooth y potente mejora de bajos.',
            'Cargador portátil con capacidad de carga rápida y diseño compacto.',
            'Smartwatch con monitorización de actividad, notificaciones inteligentes y resistencia al agua.',
            'Fundas resistentes para móvil con protección contra golpes y caídas.',
            'Cable USB de carga rápida con conectores reforzados y longitud extra.',
            'Soporte magnético para auto con rotación de 360 grados y fácil instalación.',
            'Batería externa de alta capacidad para cargar dispositivos móviles en movimiento.',
            'Lentes de realidad virtual con ajuste ergonómico y experiencia inmersiva.',
        
            // Computadoras y Accesorios
            'Laptop ultraligera con procesador de alta velocidad y batería de larga duración.',
            'Impresora multifunción con escáner integrado y conectividad inalámbrica.',
            'Monitor curvo de gran tamaño con resolución 4K y tecnología de colores vivos.',
            'Teclado inalámbrico con teclas silenciosas y diseño delgado.',
            'Mouse ergonómico para oficina con sensor óptico de alta precisión.',
            'Cámara web de alta definición con micrófono integrado y ajuste automático de luz.',
            'Disco duro externo con capacidad ampliable y transferencia de datos rápida.',
            'Mochila para portátil con compartimentos acolchados y diseño resistente al agua.',
            'Altavoces Bluetooth con sonido envolvente y conexión multipunto.',
            'Router de alta velocidad con antenas optimizadas y configuración sencilla.',
        
            // Electrónica de Consumo
            'TV LED 4K UltraHD con HDR y tecnología de mejora de imágenes.',
            'Barra de sonido con subwoofer integrado y modos de audio personalizados.',
            'Proyector HD con brillo intenso y conectividad HDMI.',
            'Reproductor Blu-ray con escalado de alta definición y reproducción de discos 3D.',
            'Sistema de audio Hi-Fi con altavoces estéreo y conexión Bluetooth.',
            'Auriculares inalámbricos con calidad de audio premium y cancelación de ruido.',
            'Receptor Bluetooth para conectar dispositivos de audio sin cables.',
            'Cargador inalámbrico con tecnología de carga rápida y diseño elegante.',
            'Control remoto universal para dispositivos de entretenimiento en el hogar.',
            'Luz LED inteligente con control de color y programación de escenas.',
        ];
        $usuariosPermitidos = [5, 10, 11, 12, 13, 14, 15];
        for ($i = 0; $i < 50; $i++) {
            $producto = new Producto();
            $producto->nombre = $nomProductos[$i];
            $producto->idCategoria = $categoriaActual;
            $producto->stock = random_int(10, 50);
            $producto->descripcion = $descripciones[$i];
            $producto->precio = $precios[$i];
            $producto->idUser = $usuariosPermitidos[array_rand($usuariosPermitidos)];

            // Verificar si el producto debe ser confirmado o no

            $producto->save();

            $contadorCategoria++;
            if ($contadorCategoria == 11) {
                $contadorCategoria = 1;
                $categoriaActual++;
                if ($categoriaActual > count($categorias)) {
                    $categoriaActual = 1; // Reiniciar el ciclo de IDs de categoría si se supera el límite
                }
            }
        }


        //AHORA LOS 20 NOCONFIRMADOS


    }
}
