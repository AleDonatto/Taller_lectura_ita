<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    //
    protected $table = 'Tareas';
    protected $primaryKey  = 'id';

    protected $fillable = ['id','Titulo','Descripcion','FechaEntrega','tareaTaller'];
}
