<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    //
    protected $table = 'Taller';
    protected $primaryKey  = 'idTaller';

    protected $fillable = ['idtaller','Periodo','Made_year','NAlumnos','Profesor'];
}
