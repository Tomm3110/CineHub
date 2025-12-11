<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /** @use HasFactory<\Database\Factories\FilmFactory> */
    use HasFactory;

    protected $fillable = [
        'titre',
        'annee',
        'realisateur',
        'synopsis'
    ];

    protected $casts = ['annee' => 'datetime'];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
