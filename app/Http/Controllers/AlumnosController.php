<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Alumnos;

class AlumnosController extends Controller
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
        $alumnos = Alumnos::all();

        return view('system.alumnos',compact('alumnos'));
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
        $alumno = DB::table('alumno')
        ->where('Ncontrol',$id)
        ->get();

        return view('system.editAlumno',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $validacion = $request->validate([
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'carrera'=>'required|string',
            'semestre'=>'required|string'
        ]);

        $alumno = DB::table('alumno')
        ->where('Ncontrol',$id)
        ->update([
            'Nombre' => $request->nombre,
            'Apellidos' => $request->apellidos,
            'Carrera' => $request->carrera,
            'Semestre' => $request->semestre
        ]);

        $notificacion = array(
            'mensajeToast' => 'Datos del alumno Modificados correctamente'
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
        try{
            $alumno = DB::table('alumno')->where('Ncontrol',$request->ncontrol)->delete();

            $notificacion = array(
                'mensajeToast' => 'Datos eliminados correctamente'
            );
            return back()->with($notificacion);
        }
        catch(QueryException $ex){
            $notificacion = array(
                'mensajeToast' => 'No es posible eliminar los datos'
            );
            return back()->with($notificacion);
        }
    }
}
