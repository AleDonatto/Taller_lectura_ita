<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Inscripcion', function (Blueprint $table) {
            $table->integer('Alumno');
            $table->string('Taller');
            $table->date('FechaInscripcion');
            $table->foreign('Alumno')->references('Ncontrol')->on('Alumno');
            $table->foreign('Taller')->references('idTaller')->on('Taller');
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
        Schema::dropIfExists('Inscripcion');
    }
}
