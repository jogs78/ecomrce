<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuevo = new Producto();
        $nuevo->nombre = "Computadora";
//        $nuevo->estado = 'propuesto';
        $nuevo->fecha_publicacion = "2024-02-29";
//        $nuevo->motivo = "";
        $nuevo->descripcion = <<<DESCRIPCION
        Computadora marca LENOVO
        Microporcesador AMD
        Ram de 16 gigas
        Disco duro de estado solido de 1 tera.
        DESCRIPCION;
        $nuevo->cantidad = 3;
        $nuevo->categoria_id = 1;
        $nuevo->propietario_id = 1;
        $nuevo->save();

        $productos = [
            [
                'nombre' => 'Lavadora', 'fecha_publicacion' => '2024-02-29', 'descripcion' => 'una lavadora', 'cantidad' => 1, 'categoria_id' => '2', 'propietario_id' => '1'          
            ],
            [
                'nombre' => 'Refrigerador', 'fecha_publicacion' => '2024-02-29', 'descripcion' => 'una refrigerador', 'cantidad' => 1, 'categoria_id' => '2', 'propietario_id' => '2'
            ]

        ];

        foreach ($productos as $producto) {
            $nuevo = new Producto();
            $nuevo->fill($producto);
            $nuevo->save();
        }
    }
}
