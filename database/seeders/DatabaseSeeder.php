<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
        ]);

        $this->call([
           FilmSeeder::class,
            MediaSeeder::class,
        ]);

        $this->call([
            GenreSeeder::class,
            ActeurSeeder::class,
        ]);

        $this->call([
            FilmGenreSeeder::class,
            ParticipeSeeder::class,
        ]);
    }
}
