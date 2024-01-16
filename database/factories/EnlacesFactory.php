<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Roles;
use App\Models\Paginas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enlaces>
 */
class EnlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_rol' => function () {
                $rol = Roles::inRandomOrder()->first();
                return $rol ? $rol->id : Roles::factory()->create()->id;
            },
            'id_pagina' => function () {
                $pagina = Paginas::inRandomOrder()->first();
                return $pagina ? $pagina->id : Paginas::factory()->create()->id;
            },
            'descripcion' => $this->faker->sentence,
            'usuario_creacion' => function () {
                $usuario = User::inRandomOrder()->first();
                return $usuario ? $usuario->id : User::factory()->create()->id;
            },
            'usuario_modificacion' => function () {
                $usuario = User::inRandomOrder()->first();
                return $usuario ? $usuario->id : User::factory()->create()->id;
            },
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
