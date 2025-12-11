<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Film;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(6),
            'content' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['validé', 'en_attente', 'supprimé']),
            'note' => $this->faker->randomFloat(1, 0, 5),
            'user_id' => User::factory(),
            'film_id' => Film::factory(),
        ];
    }
}
