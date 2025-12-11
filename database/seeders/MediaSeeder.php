<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::all()->each(function ($film) {
            Media::factory()->count(rand(1, 3))->create([
                'film_id' => $film->id
            ]);
        });
    }
}
