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
            'titre' => $this->faker->sentence(6), // Une phrase de 6 mots
            'content' => $this->faker->paragraph(3), // Un paragraphe de 3 phrases
            
            // Choix aléatoire parmi vos status définis
            'status' => $this->faker->randomElement(['validé', 'en_attente', 'supprimé']),
            
            // Génère un nombre à virgule (ex: 3.5, 4.2). 
            // Arguments : (nombre de décimales, min, max)
            'note' => $this->faker->randomFloat(1, 0, 5),
            
            // Par défaut, on crée un User et un Film pour chaque commentaire
            // (On pourra surcharger cela dans le Seeder pour lier à des existants)
            'user_id' => User::factory(),
            'film_id' => Film::factory(),
        ];
    }
}
