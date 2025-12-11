<?php

namespace App\Models;

use Illuminate\DatabaseEloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Film;

class Comment extends Model
{
    protected $fillable = [
            'titre',
            'content',
            'status',
            'note',
            'film_id',
            'user_id'
        ];

        protected $casts = [
            'note' => 'float',
        ];

        public function film() {
            return $this->belongsTo(Film::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }
}
