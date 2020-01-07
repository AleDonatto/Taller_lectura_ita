<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Taller', function (Blueprint $table) {
            $table->string('idTaller');
            $table->string('Periodo');
            $table->year('Made_year');
            $table->integer('NAlumnos');
            $table->integer('Profesor')->unsigned();
            $table->primary('idTaller');
            $table->foreign('Profesor')->references('idDocente')->on('Docente');
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
        Schema::dropIfExists('Taller');
    }
}
