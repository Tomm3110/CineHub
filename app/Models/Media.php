<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'url', 'description'];

    public function film() {
        return $this->belongsTo(Film::class);
    }
}
