<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::factory()->count(10)->create();
        Film::factory()->create([
            'titre' => 'lion',
            'annee' => '2000',
            'realisateur' => 'Jean',
            'synopsis' => 'qhfgzvzbhjz']);
    }
}
