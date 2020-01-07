<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Docentes;
use App\Usuarios;


class DocentesController extends Controller
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
        $docente = DB::table('docente')->get(); 
        return view('system.docentes',['docente'=>$docente]);
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
            'nameDocente' => 'required|string',
            'apellidos' => 'required|string',
            'nick' => 'required|string',
            'password' => 'required|string',
            'correo' => 'required|email'
        ]);

        $docente = new Docentes;
        $docente->Nombre = $request->nameDocente;
        $docente->Apellidos = $request->apellidos;
        $docente->save();

        $usuario = new Usuarios;
        $usuario->Nombre = $request->nameDocente;
        $usuario->Apellidos = $request->apellidos;
        $usuario->Nick = $request->nick;
        $usuario->password = bcrypt($request->password);
        $usuario->TipoUsuario = 'Docente';
        $usuario->email = $request->correo;
        $usuario->regComp = 'si';
        $usuario->save(); 

        $mensajeToast = array(
            'mensajeToast' => 'Docente Agregado con Exito' 
        );

        return back()->with($mensajeToast);
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
            'apellidosEdit'=>'required|string'
        ]);

        if ($validator->fails()) {
            
            $notificationUser = array(
                'mensajeToast' => 'Ocurrio un problema, asegurese de llenar todos los campos' 
            );

            return back()->with($notificationUser);
        }
        $idDocente = $request->idDocente;
        $docente = DB::table('docente')
        ->where('idDocente',$idDocente)
        ->update([
            'Nombre'=>$request->nombreEdit,
            'Apellidos'=>$request->apellidosEdit
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
    public function destroy(Request $request)
    {
        //
        $docente = DB::table('docente')->where('idDocente',$request->idDocenteDelete)->delete();

        $notificacion = array(
            'mensajeToast' => 'Datos eliminados correctamente'
        );
        return back()->with($notificacion);
    }
}
