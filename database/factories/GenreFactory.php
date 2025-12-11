<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = ['Action', 'Comédie', 'Drame', 'Science-Fiction', 'Horreur', 'Thriller', 'Romance', 'Documentaire'];
        return [
            'name' => fake()->unique()->randomElement($genres),
            'description' => $this->faker->sentence(),
        ];
    }
}
