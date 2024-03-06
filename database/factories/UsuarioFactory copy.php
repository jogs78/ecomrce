<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        fake()->addProvider(new Identificacion(fake()));

        return [
            'apellido_paterno'=> fake()->apellido(),
            'apellido_materno'=> fake()->apellido(),
            'genero'=> fake()->genero(),
            'nombre'=> fake()->nombre(),
        ];
    }
}
