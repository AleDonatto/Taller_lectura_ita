<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Usuarios;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserCheck');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario = DB::table('Usuarios')->get();
        return view('system.usuarios',['usuarios'=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validacion = $request->validate([
            'nombreuser'=>'required|string',
            'apellidosuser'=>'required|string',
            'nickuser'=>'required|string',
            'passworduser'=>'required|string'
        ]);

        $usuario = new Usuarios;
        $usuario->Nombre = $request->nombreuser;
        $usuario->Apellidos = $request->apellidosuser;
        $usuario->Nick = $request->nickuser;
        $usuario->password = bcrypt($request->passworduser);
        $usuario->TipoUsuario = 'Administrador';
        $usuario->regComp = 'si';
        $usuario->save();

        $notificacion = array(
            'mensajeToast' => 'Usuario Administrador Creado Correctamente'
        );

        return back()->with($notificacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombreEdit'=>'required|string',
            'apellidosEdit'=>'required|string',
            'nick'=>'required|string',

        ]);

        if ($validator->fails()) {
            
            $notificationUser = array(
                'mensajeToast' => 'Ocurrio un problema, asegurese de llenar todos los campos' 
            );

            return back()->with($notificationUser);
        }
        $idUser = $request->idUser;
        $docente = DB::table('Usuarios')
        ->where('id',$idUser)
        ->update([
            'Nombre'=>$request->nombreEdit,
            'Apellidos'=>$request->apellidosEdit,
            'Nick'=>$request->nick
        ]);

        $notificacion = array(
            'mensajeToast' => 'Datos del Docente Actualizado con exito'
        );
        
        return back()->with($notificacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $docente = DB::table('Usuarios')->where('id',$request->idUser)->delete();

        $notificacion = array(
            'mensajeToast' => 'Datos eliminados correctamente'
        );
        return back()->with($notificacion);
    }
}
