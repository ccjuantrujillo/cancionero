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
        Schema::create('lecture_has_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecture_id');
            $table->unsignedBigInteger('type_lecture_id');
            $table->string('titulo', 250)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('lecture_id')->references('id')->on('lectures');
            $table->foreign('type_lecture_id')->references('id')->on('type_lectures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_has_details');
    }
};
