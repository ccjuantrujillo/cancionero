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
        Schema::create('liturgies', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 250)->nullable();
            $table->string('tema', 150)->nullable();
            $table->date('fecha')->nullable();
            $table->string('descripcion_corta', 150)->nullable();
            $table->char('estado', 1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liturgies');
    }
};
