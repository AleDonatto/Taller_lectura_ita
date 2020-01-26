<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TareasSubidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TareasSubidas', function (Blueprint $table) {
            $table->integer('alumno');
            $table->bigInteger('tarea')->unsigned();
            $table->string('archivo');
            $table->string('descripcion');
            $table->dateTime('hora');
            $table->foreign('alumno')->references('Ncontrol')->on('Alumno');
            $table->foreign('tarea')->references('id')->on('Tareas');
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
        Schema::dropIfExists('TareasSubidas');
    }
}
