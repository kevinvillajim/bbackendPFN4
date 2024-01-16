<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roles>
 */
class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rolesPosibles = ['admin', 'editor', 'lector'];

        // Crear un usuario si no hay ninguno
        $usuario_creacion = User::inRandomOrder()->first();
        if (!$usuario_creacion) {
            $usuario_creacion = User::factory()->create();
        }

        // Crear un usuario diferente para usuario_modificacion
        $usuario_modificacion = User::inRandomOrder()->first();
        if (!$usuario_modificacion || $usuario_modificacion->id === $usuario_creacion->id) {
            $usuario_modificacion = User::factory()->create();
        }

        return [
            'rol' => $this->faker->randomElement($rolesPosibles),
            'usuario_creacion' => $usuario_creacion->id,
            'usuario_modificacion' => $usuario_modificacion->id,
            'estado' => $this->faker->boolean,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
