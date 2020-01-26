<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Titulo');
            $table->string('Descripcion');
            $table->date('FechaEntrega');
            $table->string('tareaTaller');
            $table->foreign('tareaTaller')->references('idTaller')->on('Taller');
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
        Schema::dropIfExists('Tareas');
    }
}
