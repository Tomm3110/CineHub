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
        return [
            'titre' => $this->faker->sentence(3,true),
            'annee' => $this->faker->dateTimeBetween(1980, new \DateTime()),
            'realisateur' => $this->faker->name(),
            'synopsis' => $this->faker->paragraph(),
        ];
    }
}
