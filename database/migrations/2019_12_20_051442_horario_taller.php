<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HorarioTaller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HorarioTaller', function (Blueprint $table) {
            $table->string('HoraInicio');
            $table->string('HoraFin');
            $table->string('Dia');
            $table->string('Taller');
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
        Schema::dropIfExists('HorarioTaller');
    }
}
