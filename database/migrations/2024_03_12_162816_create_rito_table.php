<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rito', function (Blueprint $table) {
            $table->id();
            $table->string('RITOC_Descripcion', 250)->nullable();
            $table->string('RITOC_DescripcionCorta', 250)->nullable();
            $table->boolean('RITOC_FlagEstado')->default(true);
            $table->string('RITOC_Orden', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rito');
    }
}
