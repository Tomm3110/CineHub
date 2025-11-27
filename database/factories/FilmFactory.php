<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomId = rand(1, 1000);
        return [
            'titre' => $this->faker->sentence(3,true),
            'annee' => $this->faker->dateTimeBetween(1980, new \DateTime()),
            'realisateur' => $this->faker->name(),
            'synopsis' => $this->faker->paragraph(),
            'media' => "https://loremflickr.com/400/600/movie,poster?random={$randomId}",
        ];
    }
}
