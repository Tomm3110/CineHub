<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
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
            'type' => 'poster',
            'description' => $this->faker->paragraph(),
            'url' => "https://loremflickr.com/400/600/movie,poster?random={$randomId}",
        ];
    }
}
