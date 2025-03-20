<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capilla', function (Blueprint $table) {
            $table->bigIncrements('CAPIP_Codigo');
            $table->string('CAPIC_Descripcion', 250)->nullable();
            $table->boolean('RITOC_FlagEstado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capilla');
    }
}
