<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuevo = new Usuario();
        $nuevo->correo = 'pedro@gmail.com';
        $nuevo->apellido_paterno = "GOMEZ";
        $nuevo->apellido_materno = "CRUZ";
        $nuevo->nombre = "PEDRO";
        $nuevo->genero = 'Masculino';
        $nuevo->clave = Hash::make('123');
        $nuevo->save();
        //
        $nuevo = new Usuario();
        $nuevo->correo = 'luis@gmail.com';
        $nuevo->apellido_paterno = "PEREZ";
        $nuevo->apellido_materno = "LOPEZ";
        $nuevo->nombre = "LUIS";
        $nuevo->genero = 'Masculino';
        $nuevo->clave = Hash::make('123');
        $nuevo->rol = 'Encargado';
        $nuevo->save();
    }
}
