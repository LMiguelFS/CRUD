<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $generos = [
            'Acción',
            'Aventura',
            'Comedia',
            'Drama',
            'Fantasía',
            'Terror',
            'Ciencia ficción',
            'Suspenso',
            'Documental',
            'Romance',
            'Animación',
        ];

        return [
            'titulo'=>$this->faker->word(),
            'genero'=>$this->faker->randomElement($generos),
            'fechaPublicación'=>$this->faker->date(),
            'autor_id'=>\App\Models\Autor::factory()
        ];
    }
}
