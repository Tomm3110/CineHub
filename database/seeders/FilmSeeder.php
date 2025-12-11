<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = env('TMDB_API_KEY');
        $response = Http::get("https://api.themoviedb.org/3/movie/popular", [
            'api_key' => $apiKey,
            'language' => 'fr-FR',
            'page' => 1
        ]);

        if ($response->successful()) {
            $movies = $response->json()['results'];

            foreach ($movies as $movieData) {
                $film = Film::firstOrCreate(
                    ['titre' => $movieData['title']],
                    [
                        'date_sortie' => $movieData['release_date'] ?: now(),
                        'synopsis' => $movieData['overview'] ?? 'Synopsis indisponible',
                        'duree' => rand(90, 180),
                    ]
                );

                if (!empty($movieData['poster_path'])) {
                    $imageUrl = "https://image.tmdb.org/t/p/w500" . $movieData['poster_path'];

                    Media::firstOrCreate(
                        [
                            'film_id' => $film->id,
                            'type'    => 'poster'
                        ],
                        [
                            'url'         => $imageUrl,
                            'description' => "Affiche du film " . $film->titre
                        ]
                    );
                }
            }
        }
    }
}
