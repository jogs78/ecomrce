<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Respuesta;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contador = 1;
        $actual = 1;
        $respuestasImpares = [
            // Respuestas para la pregunta sobre la Lavadora de Carga Frontal EcoClean
            'Las características principales de esta lavadora incluyen capacidad de carga frontal, eficiencia energética y múltiples programas de lavado.',
            // Respuestas para la pregunta sobre la Aspiradora Robotizada SmartClean Pro
            'Esta aspiradora robotizada funciona de manera autónoma, mapeando y limpiando diferentes áreas de forma eficiente, lo que la hace conveniente y práctica.',
            // Respuestas para la pregunta sobre la Cafetera Programable BrewMaster
            'La cafetera programable ofrece la ventaja de preparar café automáticamente en horarios programados, además de tener funciones especiales para diferentes tipos de café.',
            // Respuestas para la pregunta sobre el Ventilador de Torre CoolBreeze
            'Este ventilador de torre se destaca por su diseño compacto, potencia de enfriamiento y funciones avanzadas de control de aire.',
            // Respuestas para la pregunta sobre los Auriculares Gaming SurroundSound
            'El sonido envolvente de estos auriculares mejora la experiencia de juego al proporcionar una percepción espacial más precisa de los efectos de audio del juego.',
            // Respuestas para la pregunta sobre el Teclado Mecánico Gamer Xtreme
            'Este teclado ofrece ventajas como respuesta táctil, durabilidad y personalización de teclas para una experiencia de juego más cómoda y eficiente.',
            // Respuestas para la pregunta sobre la Alfombrilla Gaming SpeedTrack
            'La alfombrilla mejora la precisión del mouse y el deslizamiento suave durante el juego, lo que permite movimientos más precisos y rápidos.',
            // Respuestas para la pregunta sobre la Tablet ProTouch con Lápiz Stylus
            'Esta tablet ofrece ventajas como sensibilidad táctil, compatibilidad con lápiz stylus para dibujo y escritura precisa, y diversas funciones de productividad.',
            // Respuestas para la pregunta sobre los Auriculares Bluetooth BassBoost
            'El BassBoost mejora la calidad de audio al resaltar los tonos graves, proporcionando una experiencia de sonido más envolvente y profunda.',
            // Respuestas para la pregunta sobre el Soporte Magnético para Auto
            'El soporte magnético facilita el uso del dispositivo móvil en el automóvil al proporcionar una sujeción segura y ajustable sin necesidad de clips o soportes adicionales.',
            // Respuestas para la pregunta sobre los Lentes de Realidad Virtual VRVision
            'Estos lentes ofrecen experiencias de realidad virtual inmersivas, compatibles con una amplia gama de dispositivos y con aplicaciones y juegos de alta calidad.',
            // Respuestas para la pregunta sobre el Monitor Curvo de Gran Tamaño
            'Este monitor curvo proporciona ventajas como mayor campo visual, inmersión en contenido multimedia y menor fatiga visual durante largos periodos de uso.',
            // Respuestas para la pregunta sobre los Altavoces Bluetooth SoundBoost
            'Estos altavoces Bluetooth mejoran la calidad de sonido y la conectividad al ofrecer audio de alta fidelidad y compatibilidad con múltiples dispositivos.',
        ];
        
    
        foreach ($respuestasImpares as $respuesta) {
            $Respu = new Respuesta();
            $Respu->contenido = $respuesta;
            $Respu->idPregunta = 2 * $actual - 1; // Ajustar el ID de la pregunta según su posición en el arreglo de preguntas
            $Respu->idUsuario = random_int(10,15);
        
            if ($contador == 5) {
                $contador = 1;
                $actual++;
            } else {
                $contador++;
            }
            $Respu->save();
        }
        }
}
