<?php

namespace Database\Seeders;

use App\Models\Acteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ActeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = env('TMDB_API_KEY');

        for ($page = 1; $page <= 3; $page++) {
            $response = Http::get("https://api.themoviedb.org/3/person/popular", [
                'api_key' => $apiKey,
                'language' => 'fr-FR',
                'page' => $page
            ]);

            if ($response->successful()) {
                foreach ($response->json()['results'] as $person) {
                    Acteur::firstOrCreate(
                        ['name' => $person['name']],
                        [
                            'date_naissance' => now()->subYears(rand(20, 60)),
                            'biographie' => "Acteur populaire (ID TMDB: {$person['id']})"
                        ]
                    );
                }
            }
        }    }
}
