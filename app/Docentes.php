<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    //
    protected $table = 'Docente';
    protected $primaryKey  = 'idDocente';

    protected $fillable = ['idDocente','Nombre','Apellidos'];
}
