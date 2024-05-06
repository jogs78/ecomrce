<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Encargado','Cliente','Contador','Supervisor','Vendedor'];
        $correos = ['encargado@gmail.com','cliente@gmail.com','contador@gmail.com','supervisor@gmail.com','vendedor@gmail.com'];

        foreach ($roles as $index => $rolNombre) {
            $usu = new User();
            $usu->name = 'Usuario ' . $index; 
            $usu->apellido_paterno = 'Usuario' . $index; 
            $usu->apellido_materno = 'Usuario' . $index; 
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = $index + 1; 
            $usu->email = $correos[$index];
            $usu->sexo = 'Masculino';
            $usu->direccion = $index + 1; 
            $usu->rol = $rolNombre;
            $usu->password = $correos[$index];
            $usu->save();
        }

        //CREAR 3 USUARIOS DEL TIPO ENCARGADO
        for($i = 1; $i<=3 ;$i++){
            $usu = new User();
            $usu->name= 'Encargado '.$i;
            $usu->apellido_paterno = 'Encargado '.$i;
            $usu->apellido_materno = 'Encargado '.$i;
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = 661+$i;
            $usu->email = 'encargado'.$i.'@gmail.com';
            $usu->sexo = 'Masculino';
            $usu->direccion = $i + 1; 
            $usu->rol = 'Encargado';
            $usu->password = 'encargado'.$i.'@gmail.com';
            $usu->save();
        }

        //CREAR 2 USUARIOS DEL TIPO SUPERVISOR
        for($i = 1; $i<=2 ;$i++){
            $usu = new User();
            $usu->name= 'Supervisor '.$i;
            $usu->apellido_paterno = 'Supervisor '.$i;
            $usu->apellido_materno = 'Supervisor '.$i;
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = 661+$i;
            $usu->email = 'supervisor'.$i.'@gmail.com';
            $usu->sexo = 'Masculino';
            $usu->direccion = $i + 1; 
            $usu->rol = 'Supervisor';
            $usu->password = 'supervisor'.$i.'@gmail.com';
            $usu->save();
        }

        //CREAR 5 VENDEDORES
        for($i = 1; $i<=5 ;$i++){
            $usu = new User();
            $usu->name= 'Vendedores '.$i;
            $usu->apellido_paterno = 'Vendedores '.$i;
            $usu->apellido_materno = 'Vendedores '.$i;
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = 661+$i;
            $usu->email = 'vendedor'.$i.'@gmail.com';
            $usu->sexo = 'Masculino';
            $usu->direccion = $i + 1; 
            $usu->rol = 'Vendedor';
            $usu->password = 'vendedor'.$i.'@gmail.com';
            $usu->save();
        }

        //CREAR COMPRADORES
        for($i = 1; $i<=5 ;$i++){
            $usu = new User();
            $usu->name= 'Comprador '.$i;
            $usu->apellido_paterno = 'Comprador '.$i;
            $usu->apellido_materno = 'Comprador '.$i;
            $usu->fecha_nacimiento = '2000-05-01';
            $usu->no_telefono = 661+$i;
            $usu->email = 'comprador'.$i.'@gmail.com';
            $usu->sexo = 'Masculino';
            $usu->direccion = $i + 1; 
            $usu->rol = 'Cliente';
            $usu->password = 'comprador'.$i.'@gmail.com';
            $usu->save();
        }


    }
}
