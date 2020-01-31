<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuarios extends Model implements AuthenticatableContract
{
    //
    use Authenticatable;
    protected $table = 'Usuarios';
    protected $primaryKey  = 'id';

    protected $fillable = ['id','Nombre','Apellidos','Nick','password','TipoUsuario','regComp'];

    //protected $dateFormat = 'M j Y h:i:s';

    public function getAuthIdentifier(){
        return $this->getKey();
    }
      
    public function getAuthPassword(){
        return $this->password;
    }
  
    public function username(){
        return $this->Nick;
    }
}
