<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'Evaluacion';
    protected $primaryKey  = 'id';

    protected $fillable = ['id','alumno','taller','acredito','c1','c2','c3','c4','c5','c6','c7'];
}
