<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsuariosSeeder::class);
        $this->call(PersonasSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(BitacorasSeeder::class);
        $this->call(PaginasSeeder::class);
        $this->call(EnlacesSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
