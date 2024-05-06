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
        $preguntas = [
            '¿Cuál es la duración de la batería de esta laptop UltraSlim?',
            '¿Esta cámara incluye un estuche de transporte?',
            '¿Qué tipo de café puedes preparar con esta máquina de café Barista?',
            '¿Cuál es la resolución máxima de escaneo de este escáner portátil?',
            '¿Cuál es la garantía de este reloj de lujo TimeMaster?',
            '¿Estos pantalones vaqueros vienen en diferentes tallas?',
            '¿Qué material se utiliza para fabricar este bolso elegante ChicStyle?',
            '¿Son aptas estas macetas para uso en exteriores?',
            '¿Qué tamaño de manos son adecuados para estos guantes de jardinería ComfortGrip?',
            '¿Cuál es el ancho de corte de esta podadora de césped PowerTrim?'
        ];
        
        for($i = 0; $i<10; $i++){
        $pregunta = new Pregunta();
        $pregunta->idProducto =  3 * $i + 1;
        $pregunta->contenido = $preguntas[$i];
        $pregunta->idUsuario = 5; 
        $pregunta->save();
        }
    }
}
