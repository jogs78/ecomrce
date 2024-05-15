<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consiga;

class ConsigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = ['Pendiente', 'Aceptado', 'Rechazado'];
        for ($i = 0; $i < 50; $i++) {
            $consigna = new Consiga();
            $consigna->idProducto = $i+1;
            $consigna->idEncargado = random_int(6,8);
            $consigna->estado = $estados[array_rand($estados)];
            if($consigna->estado == 'Rechazado'){
                $consigna->mensaje = 'Ta muy feo tu producto';
            }
            $consigna->save();

        }
    }
}
