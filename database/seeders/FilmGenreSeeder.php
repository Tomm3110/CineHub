<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FilmGenreSeeder extends Seeder
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
                $tmdbFilm = $search->json()['results'][0];

                foreach ($tmdbFilm['genre_ids'] as $tmdbGenreId) {
                    $details = Http::get("https://api.themoviedb.org/3/movie/{$tmdbFilm['id']}", [
                        'api_key' => $apiKey, 'language' => 'fr-FR'
                    ]);

                    if($details->successful()){
                        foreach($details->json()['genres'] as $g){
                            $localGenre = Genre::where('name', $g['name'])->first();
                            if ($localGenre) {
                                DB::table('film_genre')->insertOrIgnore([
                                    'film_id' => $film->id,
                                    'genre_id' => $localGenre->id
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
