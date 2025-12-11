<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = env('TMDB_API_KEY');

        $response = Http::get("https://api.themoviedb.org/3/genre/movie/list", [
            'api_key' => $apiKey,
            'language' => 'fr-FR',
        ]);

        if ($response->successful()) {
            $genres = $response->json()['genres'];

            foreach ($genres as $genreData) {
                Genre::updateOrCreate(
                    ['name' => $genreData['name']],
                    ['description' => "Films de la catégorie " . $genreData['name']]
                );
            }
        }
    }
}
