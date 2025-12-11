<?php

namespace Database\Seeders;

use App\Models\Acteur;
use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ParticipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::all();
        $apiKey = env('TMDB_API_KEY');

        foreach ($films as $film) {
            $search = Http::get("https://api.themoviedb.org/3/search/movie", [
                'api_key' => $apiKey,
                'query' => $film->titre,
                'language' => 'fr-FR'
            ]);

            if ($search->successful() && !empty($search->json()['results'])) {
                $tmdbId = $search->json()['results'][0]['id'];

                // 2. Récupération du Casting (Credits)
                $credits = Http::get("https://api.themoviedb.org/3/movie/{$tmdbId}/credits", [
                    'api_key' => $apiKey,
                ]);

                if ($credits->successful()) {
                    $cast = array_slice($credits->json()['cast'], 0, 5);

                    foreach ($cast as $castMember) {
                        $acteur = Acteur::firstOrCreate(
                            ['name' => $castMember['name']],
                            [
                                'date_naissance' => now(),
                                'biographie' => "Acteur identifié via le film " . $film->titre
                            ]
                        );

                        DB::table('participe')->insertOrIgnore([
                            'film_id' => $film->id,
                            'acteur_id' => $acteur->id,
                            'role' => $castMember['character'],
                            'note' => fake()->randomFloat(1, 0, 10),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
