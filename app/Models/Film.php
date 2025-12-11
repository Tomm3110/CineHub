<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Film extends Model
{
    /** @use HasFactory<\Database\Factories\FilmFactory> */
    use HasFactory;

    protected $fillable = [
        'titre',
        'annee',
        'realisateur',
        'synopsis',
        'media',
    ];

    protected $casts = ['annee' => 'datetime'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
