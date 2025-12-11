<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acteur>
 */
class ActeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'date_naissance' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'biographie' => $this->faker->realText(200),
        ];
    }
}
