<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Participe extends Pivot
{
    protected $table = 'participe';
    public $incrementing = false;
    protected $fillable = ['film_id', 'acteur_id', 'role', 'note'];
}
