<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker= fake();
        $faker->addProvider(new Identificacion($faker));
        $genero = $faker->genero();
        $nombre = ($genero == 'MASCULINO') ? $faker->nombreMasculino() : $faker->nombreFemenino();
        $correo = fake()->unique()->safeEmail();
        $clave = Hash::make($correo);

        return [
            'clave' => $clave,
            'correo' => $correo,
            'apellido_paterno' => $faker->apellido(),
            'apellido_materno' => $faker->apellido(),
            'nombre' => $nombre,
            'genero' => $genero,
        ];
    }
}
