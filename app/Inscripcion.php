<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    //
    protected $table = 'Inscripcion';

    protected $fillable = ['Alumno','Taller','FechaInscripcion'];
}
