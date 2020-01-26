<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TareasSubidas extends Model
{
    //
    protected $table = 'TareasSubidas';

    protected $fillable = ['alumno','tarea','archivo','descripcion','hora'];

}
