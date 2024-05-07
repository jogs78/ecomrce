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
        $NomProductos = [
            // Tecnología
            'Laptop UltraSlim',
            'Auriculares Bluetooth BassBoost',
            'Reloj Inteligente SmartTech',
            'Cámara Digital HD CapturePro',
            'Botella de Agua Térmica EcoFresh',
            'TV LED 4K UltraHD VisionMax',
            'Máquina de Café Espresso Barista',
            'Secadora de Pelo iStyle',
            'Aspiradora Robótica SmartClean',
            'Escáner Portátil ScanPro',
        
            // Moda
            'Camisa de Algodón Premium',
            'Zapatillas Deportivas AirFlex',
            'Reloj de Lujo TimeMaster',
            'Juego de Toallas de Lujo',
            'Lentes de Sol Polarizados SunShield',
            'Pantalones Vaqueros UltraFlex',
            'Bufanda de Invierno CozyWrap',
            'Gorra de Moda StreetStyle',
            'Bolso Elegante ChicStyle',
            'Botas de Cuero LuxuryStyle',
        
            // Jardinería
            'Set de Herramientas de Jardinería GreenGarden',
            'Macetas Decorativas TerraCotta',
            'Semillas Orgánicas Premium',
            'Manguera de Riego FlexiFlow',
            'Guantes de Jardinería ComfortGrip',
            'Invernadero Portátil GreenHouse',
            'Fertilizante Natural BioGrow',
            'Podadora de Césped PowerTrim',
            'Abono Orgánico EcoCare',
            'Plantas de Interior ExoticLife',
        
            // Deportes
            'Bicicleta de Montaña TrailBlazer',
            'Set de Pesas PowerLift',
            'Balón de Fútbol UltraGrip',
            'Raqueta de Tenis ProMaster',
            'Mochila Deportiva AdventurePack',
            'Cinta de Correr RunningPro',
            'Guantes de Entrenamiento FitGrip',
            'Pelota de Yoga BalanceFit',
            'Gafas de Natación AquaView',
            'Ropa Deportiva FlexFit',
        
            // Videojuegos
            'Juego de Consola NextGen',
            'Controlador Gaming ElitePro',
            'Teclado Mecánico Gamer Xtreme',
            'Monitor de Alta Resolución GameView',
            'Auriculares Gaming SurroundSound',
            'Silla Gamer ErgoMax',
            'Mouse Óptico PrecisionPro',
            'Tarjeta Gráfica UltraRender',
            'Micrófono Profesional StreamMic',
            'Alfombrilla Gaming SpeedTrack',
        ];
        
        $descripciones = [
            'Laptop ultradelgada y ligera con potente rendimiento y pantalla de alta resolución.',
            'Auriculares inalámbricos con tecnología Bluetooth y potente mejora de bajos.',
            'Reloj inteligente con pantalla táctil, seguimiento de actividad y notificaciones inteligentes.',
            'Cámara digital de alta definición con zoom óptico, grabación de video en HD y modos avanzados de fotografía.',
            'Botella de agua térmica con aislamiento de doble pared y diseño ecológico.',
            'Televisor LED de alta definición con resolución 4K, colores vibrantes y sonido envolvente.',
            'Máquina de café espresso con sistema automático, espumador de leche y variedad de ajustes de café.',
            'Secadora de cabello profesional con múltiples configuraciones de temperatura y velocidad.',
            'Aspiradora robotizada con tecnología inteligente de limpieza y control remoto desde tu dispositivo móvil.',
            'Escáner portátil de documentos con alta resolución y capacidad de digitalización rápida.',
            'Camisa de algodón suave y transpirable con diseño elegante y detalles de calidad.',
            'Zapatillas deportivas con tecnología AirFlex para mayor comodidad y soporte durante el ejercicio.',
            'Reloj de lujo con mecanismo automático, diseño sofisticado y materiales de alta calidad.',
            'Juego de toallas de lujo de algodón absorbente y suave para uso diario en el baño.',
            'Lentes de sol polarizados con protección UV, diseño moderno y monturas resistentes.',
            'Pantalones vaqueros cómodos y flexibles para un estilo casual y versátil.',
            'Bufanda suave y abrigada para los días fríos de invierno.',
            'Gorra de moda con diseño urbano y ajuste cómodo.',
            'Bolso elegante para complementar tu look con estilo.',
            'Botas de cuero de alta calidad para un toque de lujo y durabilidad.',
            'Set completo de herramientas de jardinería para mantener tu jardín en perfecto estado.',
            'Macetas decorativas de terracota para plantas de interior y exterior.',
            'Semillas orgánicas de alta calidad para cultivar tu propio huerto en casa.',
            'Manguera de riego flexible y resistente para mantener tus plantas hidratadas.',
            'Guantes de jardinería con agarre cómodo y protección para tus manos durante las labores en el jardín.',
            'Invernadero portátil para proteger tus plantas y crear un ambiente ideal para su crecimiento.',
            'Fertilizante natural para promover el desarrollo saludable de tus plantas.',
            'Podadora de césped eléctrica para mantener tu jardín en orden.',
            'Abono orgánico para mejorar la calidad del suelo y estimular el crecimientode las Plantas',
            'Plantas de interior de variedades exóticas para agregar belleza y frescura a tu hogar.',
            'Bicicleta de montaña con cuadro resistente y componentes de alta calidad para aventuras off-road.',
            'Set de pesas para entrenamiento de fuerza con barras y discos de diferentes pesos.',
            'Balón de fútbol con diseño aerodinámico y agarre mejorado para un juego preciso.',
            'Raqueta de tenis profesional con tecnología de absorción de impactos y agarre antideslizante.',
            'Mochila deportiva con múltiples compartimentos y sistema de ajuste ergonómico.',
            'Cinta de correr para entrenamientos intensivos en casa o en el gimnasio.',
            'Guantes de entrenamiento con agarre cómodo y protección para tus manos.',
            'Pelota de yoga para ejercicios de equilibrio, fuerza y flexibilidad.',
            'Gafas de natación con diseño aerodinámico y visión clara bajo el agua.',
            'Ropa deportiva diseñada para brindar comodidad y libertad de movimiento.',
            'Juego de consola de última generación con gráficos de alta definición y experiencias de juego envolventes.',
            'Controlador para juegos con diseño ergonómico y botones personalizables para una experiencia de juego óptima.',
            'Teclado mecánico para juegos con respuesta rápida y retroiluminación personalizable.',
            'Monitor de alta resolución diseñado para jugadores con imágenes nítidas y tiempos de respuesta rápidos.',
            'Auriculares para juegos con sonido envolvente y cancelación de ruido para una experiencia inmersiva.',
            'Silla gaming ergonómica para largas sesiones de juego cómodas y saludables.',
            'Mouse óptico de precisión para movimientos rápidos y precisos durante el juego.',
            'Tarjeta gráfica potente para renderizar gráficos de alta calidad en tus juegos favoritos.',
            'Micrófono profesional para streaming y comunicación clara en juegos en línea.',
            'Alfombrilla gaming con superficie de deslizamiento suave y base antideslizante para un control preciso.',


        ];
        
        $contadorConfirmados = 0;
        $contadorNoConfirmados = 0;


        for ($i = 0; $i < 50; $i++) {
            $producto = new Producto();
            $producto->nombre = $NomProductos[$i];
            $producto->idCategoria = $categoriaActual;
            $producto->stock = 50;
            $producto->descripcion = $descripciones[$i];
            $producto->idUser = 4;

            // Verificar si el producto debe ser confirmado o no
            if ($contadorConfirmados < 30) {
                $producto->confirmado = true;
                $contadorConfirmados++;
            } else {
                $producto->confirmado = false;
                $contadorNoConfirmados++;
            }

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
