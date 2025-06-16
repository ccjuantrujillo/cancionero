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
        Schema::create('coleccion_has_songs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coleccion_id');
            $table->unsignedBigInteger('category_id');            
            $table->unsignedBigInteger('song_id');
            $table->unsignedBigInteger('ritual_id');
            $table->integer('orden')->default(0);
            $table->char('estado', 1)->default('1');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('coleccion_id')->references('id')->on('coleccions');
            $table->foreign('category_id')->references('id')->on('categories');            
            $table->foreign('song_id')->references('id')->on('songs');
            $table->foreign('ritual_id')->references('id')->on('rituals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coleccion_has_songs');
    }
};
