<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Encargado','Cliente','Contador','Supervisor','Vendedor'];
        $correos = ['encargado@gmail.com','cliente@gmail.com','contador@gmail.com','supervisor@gmail.com','vendedor@gmail.com'];

        foreach ($roles as $index => $rolNombre) {
            $usu = new Usuario();
            $usu->ine_ife = $index + 1; 
            $usu->nombre = 'Usuario ' . $index; 
            $usu->apellido_paterno = 'Usuario' . $index; 
            $usu->apellido_materno = 'Usuario' . $index; 
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = $index + 1; 
            $usu->correo_electronico = $correos[$index];
            $usu->sexo = 'Masculino';
            $usu->direccion = $index + 1; 
            $usu->rol = $rolNombre;
            $usu->contra = $correos[$index];
            $usu->save();
        }

    }
}
