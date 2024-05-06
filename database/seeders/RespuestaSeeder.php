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
        $respuestas = [

            // Respuestas para la pregunta sobre la Laptop UltraSlim
            'La duración de la batería es de aproximadamente 8 horas con uso continuo.',
            'La batería de esta laptop puede durar hasta 8 horas sin necesidad de recargarla.',
            'La batería de esta laptop tiene una autonomía de hasta 8 horas bajo uso normal.',
            'Con un uso continuo, la batería de esta laptop puede durar hasta 8 horas.',
            'La batería de esta laptop proporciona hasta 8 horas de duración con una carga completa.',
            // Respuestas para la pregunta sobre la Cámara Digital HD CapturePro
            'Sí, esta cámara incluye un estuche de transporte acolchado.',
            'Sí, la cámara viene con un estuche de transporte acolchado para mayor protección.',
            'La cámara viene acompañada de un estuche de transporte acolchado para su protección.',
            'Este modelo de cámara incluye un estuche de transporte acolchado.',
            'Sí, el paquete incluye un estuche de transporte acolchado para la cámara.',
            // Respuestas para la pregunta sobre la Máquina de Café Espresso Barista
            'Puedes preparar café expreso, capuchino y latte, entre otras variedades.',
            'Con esta máquina puedes preparar café expreso, capuchino, latte y otras deliciosas variedades.',
            'Podrás preparar café expreso, capuchino, latte y otras bebidas con esta máquina.',
            'Esta máquina te permite preparar café expreso, capuchino, latte y más.',
            'La máquina de café barista te permite preparar diferentes tipos de café como expreso, capuchino y latte.',
            // Respuestas para la pregunta sobre el Escáner Portátil ScanPro
            'La resolución máxima de escaneo es de 1200 ppp (puntos por pulgada).',
            'El escáner tiene una resolución máxima de escaneo de 1200 ppp (puntos por pulgada).',
            'El máximo nivel de resolución de escaneo es de 1200 ppp (puntos por pulgada).',
            'Con este escáner, puedes alcanzar una resolución máxima de 1200 ppp (puntos por pulgada).',
            'La resolución máxima de este escáner portátil es de 1200 ppp (puntos por pulgada).',
            // Respuestas para la pregunta sobre el Reloj de Lujo TimeMaster
            'La garantía de este reloj es de 2 años.',
            'El reloj TimeMaster está respaldado por una garantía de 2 años.',
            'Este reloj de lujo cuenta con una garantía de 2 años.',
            'El reloj viene con una garantía estándar de 2 años.',
            'La garantía de este reloj de lujo es de 2 años.',
            // Respuestas para la pregunta sobre los Pantalones Vaqueros UltraFlex
            'Sí, estos pantalones vienen en diferentes tallas para adaptarse a distintos cuerpos.',
            'Los pantalones están disponibles en una variedad de tallas para un ajuste perfecto.',
            'Puedes elegir estos pantalones en varias tallas para un ajuste cómodo.',
            'Este modelo de pantalones viene en diferentes tallas para satisfacer las necesidades de todos.',
            'Sí, estos pantalones están disponibles en diferentes tallas para adaptarse a diferentes cuerpos.',
            // Respuestas para la pregunta sobre el Bolso Elegante ChicStyle
            'El material del bolso es resistente al agua y fácil de limpiar.',
            'Este bolso está fabricado con material resistente al agua y de fácil mantenimiento.',
            'El bolso elegante ChicStyle está hecho de material resistente al agua y lavable.',
            'El bolso está elaborado con un material que es resistente al agua y fácil de mantener.',
            'Sí, el bolso está fabricado con un material que es resistente al agua y de fácil cuidado.',
            // Respuestas para la pregunta sobre las Macetas Decorativas TerraCotta
            'Sí, estas macetas son aptas para uso en exteriores.',
            'Las macetas TerraCotta son ideales tanto para uso en interiores como en exteriores.',
            'Estas macetas son adecuadas para su uso tanto en espacios interiores como exteriores.',
            'Estas macetas están diseñadas para resistir condiciones exteriores, como la exposición al sol y la lluvia.',
            'Sí, estas macetas están especialmente diseñadas para su uso en exteriores.',
            // Respuestas para la pregunta sobre los Guantes de Jardinería ComfortGrip
            'Estos guantes son de tamaño estándar y se ajustan a la mayoría de las manos.',
            'Los guantes ComfortGrip vienen en tamaño estándar y se adaptan a la mayoría de las manos.',
            'Puedes encontrar estos guantes en tamaño estándar, ideales para la mayoría de las manos.',
            'Estos guantes están diseñados en tamaño estándar para ofrecer un ajuste cómodo en la mayoría de las manos.',
            'Sí, estos guantes de jardinería están disponibles en tamaño estándar para adaptarse a la mayoría de las manos.',
            // Respuestas para la pregunta sobre la Podadora de Césped PowerTrim
            'El ancho de corte de esta podadora es de 40 cm.',
            'La podadora de césped PowerTrim tiene un ancho de corte de 40 cm.',
            'Con esta podadora puedes cortar el césped con un ancho de corte de 40 cm.',
            'El ancho de corte de esta podadora es de 40 centímetros.',
            'La podadora PowerTrim tiene una capacidad de corte de 40 cm de ancho.',
            ];
        
    
        foreach($respuestas as $respuestas){

            $Respu = new Respuesta();
            $Respu->contenido = $respuestas;
            $Respu->idPregunta = $actual;
            $Respu->idUsuario = 5;

            if($contador == 5){
                $contador = 1;
                $actual++;
            }else{
                $contador++;
            }
            $Respu->save();
        }
        }
}
