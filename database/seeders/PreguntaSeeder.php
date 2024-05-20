<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntasImpares = [
            '¿Cuáles son las características principales de esta lavadora?',
            '¿Cómo funciona esta aspiradora robotizada y cuáles son sus ventajas?',
            '¿Qué características tiene esta cafetera programable y cómo mejora la experiencia de preparar café?',
            '¿Qué lo hace especial en comparación con otros ventiladores de torre?',
            '¿Cómo mejora la experiencia de juego el sonido envolvente de estos auriculares?',
            '¿Qué ventajas ofrece este teclado mecánico para jugadores profesionales?',
            '¿Cómo mejora esta alfombrilla la precisión y el deslizamiento durante el juego?',
            '¿Qué funciones y ventajas ofrece esta tablet en comparación con otras?',
            '¿Cómo mejora la experiencia de audio el BassBoost de estos auriculares Bluetooth?',
            '¿Cómo facilita este soporte magnético el uso del dispositivo móvil en el automóvil?',
            '¿Qué experiencias de realidad virtual ofrece y qué dispositivos son compatibles con estos lentes?',
            '¿Qué ventajas ofrece este monitor curvo para diversas actividades?',
            '¿Cómo mejora la calidad de sonido y la conectividad este altavoz Bluetooth?',
            '¿Cómo mejora esta barra de sonido la calidad y la inmersión del sonido en el entretenimiento en el hogar?',
            '¿Qué calidad de audio y funciones de alta fidelidad tiene este sistema de audio?',
            '¿Qué calidad de audio y funciones de alta fidelidad tiene este sistema de audio?',
        ];
        
        for ($i = 0; $i < 16; $i++) {
            $pregunta = new Pregunta();
            $pregunta->idProducto = 2 * $i + 1;
            $pregunta->contenido = $preguntasImpares[$i];
            $pregunta->idUsuario = random_int(16, 20); 
            $pregunta->save();
        }
    }
}
