<?php

use App\Models\Acteur;
use App\Models\Film;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participe', function (Blueprint $table) {
            $table->foreignIdFor(Film::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Acteur::class)->constrained()->onDelete('cascade');
            $table->primary(['film_id', 'acteur_id']);
            $table->float('note')->nullable();
            $table->String('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participe');
    }
};
