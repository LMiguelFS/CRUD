<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paises = [
            'México',
            'Argentina',
            'Brasil',
            'Chile',
            'Perú',
            'Colombia',
            'Venezuela',
        ];
        return [
           'nombres'=>$this->faker->word(),
           'apellidos'=>$this->faker->word(),
           'nacionalidad'=>$this->faker->randomElement($paises),
           'fechaNacimiento'=> $this->faker->date(),
           'celular'=> '9' . mt_rand(10000000, 99999999)
        ];
    }
}
