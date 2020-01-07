<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    //
    protected $table = 'Alumno';
    protected $primaryKey  = 'Ncontrol';

    protected $fillable = ['Ncontrol','Nombre','Apellidos','Carrera','Semestre','Taller'];
}
