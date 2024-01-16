<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paginas>
 */
class PaginasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario_creacion' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'usuario_modificacion' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'url' => $this->faker->url,
            'estado' => $this->faker->boolean,
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'img' => $this->faker->imageUrl(),
            'tipo' => $this->faker->word,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
