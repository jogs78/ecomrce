<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $arreglo =  [
        'Electrodomésticos',
        'Videojuegos',
        'Dispositivos móviles',
        'Computadoras y accesorios',
        'Electrónica de consumo'
    ];
    foreach($arreglo as $arreglo){
    $cat = new Categoria();
    $cat -> nombre = $arreglo;
    $cat -> save(); 
    }
    }
}
