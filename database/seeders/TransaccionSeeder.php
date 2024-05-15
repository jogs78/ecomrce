<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaccion;



class TransaccionSeeder extends Seeder
{
    public function run()
    {
        $estados = ['Pendiente', 'Aceptado','Rechazado'];
        // Generar 50 transacciones con productos del 1 al 50 y usuarios del 16 al 23
        for ($i = 1; $i <= 50; $i++) {
            $transaccion = new Transaccion();
            $transaccion->idProducto = $i;
            $transaccion->cantidad = rand(1, 10); // Cantidad aleatoria entre 1 y 10
            $transaccion->precio = rand(100, 10000) / 100; // Precio aleatorio entre 1 y 10000 con dos decimales
            $transaccion->idUsuario = rand(16, 20);
            $transaccion->voucher = null;
            $transaccion->calificacion = null;
            $transaccion->estado = $estados[array_rand($estados)]; // Estado aleatorio (0 o 1)
            $transaccion->save();
        }
    }
}

