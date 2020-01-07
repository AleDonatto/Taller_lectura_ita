<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioTaller extends Model
{
    //
    protected $table = 'HorarioTaller';
    //protected $primaryKey  = 'idDocente';

    protected $fillable = ['HoraInicio','HoraFin','Dia','Taller'];
}
