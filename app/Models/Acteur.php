<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    /** @use HasFactory<\Database\Factories\ActeurFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'date_naissance',
        'biographie',
    ];

    protected $casts = ['date_naissance' => 'datetime'];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'participe')
            ->using(Participe::class)
            ->withPivot('role', 'note')
            ->withTimestamps();
    }
}
