<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\Alumnos;
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
            
            foreach($result as $item){
                $id = $item->id;
                $nombre = $item->Nombre;
                $apellido = $item->Apellidos;
                $identificador = $item->Nick;
                $Tipouser = $item->TipoUsuario;
                $registro = $item->regComp;
            }
            session(['idUser'=>$id]);
            session(['nombre'=>$nombre]);
            session(['apellidos'=>$apellido]);
            session(['identificador'=>$identificador]);
            session(['tipouser'=>$Tipouser]);
            session(['registro'=>$registro]);

            if(session('tipouser')=='Alumno'){
                return redirect()->route('profileStudent');
            }else if(session('tipouser')=='Administrador'){
                return redirect()->route('profileAdmin');
            }else{
                return redirect()->route('profileTeacher');
            }

        }else{
            $errorLogin = array(
                'errorLogin' => 'Usuario o Contraseña incorrecto'
            );
            return back()->with($errorLogin);
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
            'confirmarPassword' => 'required|string',
            'correo' => 'required|email'
        ]);

        if($request->password != $request->confirmarPassword){
            $errorPassword = array(
                'errorPassword' => 'Las contraseñas no coinciden' 
            );
            
            return back()->with($errorPassword);
        }else{

            $total = DB::table('Usuarios')->where('Nick',$request->Ncontrol)->count();
            if($total==1){
                $existe = array(
                    'existe' => 'El numero de control ingresado ya a sido registrado anteriormente'
                );
                return back()->with($existe);
            }else{
                $usuarios = new Usuarios;
                $usuarios->Nombre = $request->nombre;
                $usuarios->Apellidos = $request->apellidos;
                $usuarios->Nick = $request->Ncontrol;
                $usuarios->password = bcrypt($request->password);
                $usuarios->TipoUsuario = 'Alumno';
                $usuarios->email = $request->correo;
                $usuarios->regComp = 'no';
                $usuarios->save();

                $bien = array(
                    'bien'=>'Te has registrado correctamente. Ahora puedes iniciar sesion'
                );
                return back()->with($bien);               
            }
        }
        
    }

    public function Cerrar_Session(Request $request){
        //Auth::logout();
        //$request->session()->flush();
        //session::flush();
        //session_destroy();
        //return view('welcome');
        $this->guard()->logout();

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/');
    }

    public function ViewCambioPassword(){
        return view('changePassword');
    }

    public function CambioPassword(Request $request){
        $validacion = $request->validate([
            'nombre'=>'string|required',
            'apellidos'=>'string|required',
            'password'=>'required|string',
            'cpassword'=>'required|string'
        ]);

        if($request->password != $request->cpassword){
            $mensaje = array(
                'diferente'=>'Las constraseñas nos coinciden'
            );
            return back()->with($mensaje);
        }

        $usuario = DB::table('usuarios')
        ->where([
            'Nombre'=>$request->nombre,
            'Apellidos'=>$request->apellidos
        ])
        ->update([
            'password'=>bcrypt($request->password)
        ]);

        $notificacion = array(
            'cambio' => 'Su contraseña a sido cambiada'
        );
        
        return back()->with($notificacion);
        
    }

    protected function guard()
    {
        return Auth::guard();
    }

}
