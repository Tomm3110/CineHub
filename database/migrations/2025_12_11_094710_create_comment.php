<?php

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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('content');
            $table->enum('status', ['validé', 'en_attente', 'supprimé']);
            $table->float('note');
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->foreignIdFor(Film::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Film::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
