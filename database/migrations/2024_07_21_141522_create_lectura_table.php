<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectura', function (Blueprint $table) {
            $table->bigIncrements('LECTP_Codigo');
            $table->integer('TIPOLECP_Codigo')->unsigned()->comment('1:1era Lectura, 2: Salmo, 3: Segunda lectura, 4: Evangelio');
            $table->string('LECTC_Titulo', 250)->nullable();
            $table->string('LECTC_Descripcion', 250)->nullable();
            $table->date('LECTC_Fecha')->nullable();
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
        Schema::dropIfExists('lectura');
    }
}
