<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personas>
 */
class PersonasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomUser = User::inRandomOrder()->first();

        if (!$randomUser) {
            $randomUser = User::factory()->create();
        }

        return [
            'primer_nombre' => $this->faker->firstName,
            'segundo_nombre' => $this->faker->optional()->firstName,
            'primer_apellido' => $this->faker->lastName,
            'segundo_apellido' => $this->faker->optional()->lastName,
            'bio' => $this->faker->optional()->text,
            'phone' => $this->faker->phoneNumber(),
            'usuario_creacion' => $randomUser->id,
            'usuario_modificacion' => $randomUser->id,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
