<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    //

    public function Form_login(){
        return view('iniciar');
    }

    public function login_init(Request $request){
        
        $validated = $this->Validate(
            request(),[
                'username' => 'required|string',
                'password' => 'required|string'
            ]
        );

        if(Auth::attempt(['Nick'=>$validated['username'],'password'=>$validated['password']])){
            $result = DB::select('select * from Usuarios where Nick = :nick',['nick'=>$validated['username']]);

            return $result;
        }

    }

    public function Form_registro(){
        return view('registro');
    }

    public function Registro(Request $request){

        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'Ncontrol' => 'required|integer',
            'password' => 'required|string',
            'confirmarPassword' => 'required|string' 
        ]);

        if($request->password != $request->confirmarPassword){
            $errorPassword = array(
                'errorPassword' => 'Las contraseñas no coinciden' 
            );
            return back()
            ->with($errorPassword);
        }else{
            $usuarios = new Usuarios;
            $usuarios->Nombre = $request->nombre;
            $usuarios->Apellidos = $request->apellidos;
            $usuarios->Nick = $request->Ncontrol;
            $usuarios->password = bcrypt($request->password);
            $usuarios->TipoUsuario = 'Alumno';
            $usuarios->email = $request->correo;
            $usuarios->save();

            return view('welcome');

        }
        
    }





}
