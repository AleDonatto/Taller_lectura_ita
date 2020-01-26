<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Evaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alumno');
            $table->string('taller');
            $table->string('acredito');
            $table->set('c1',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c2',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c3',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c4',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c5',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c6',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->set('c7',['Insuficiente','Suficiente','Bueno','Notable','Excelente']);
            $table->foreign('alumno')->references('Ncontrol')->on('Alumno');
            $table->foreign('taller')->references('idTaller')->on('Taller');
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
        Schema::dropIfExists('Evaluacion');
    }
}
