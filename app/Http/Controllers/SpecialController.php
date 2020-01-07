<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Alumnos;
Use App\Usuarios;

class SpecialController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserCheck');
    }

    //
    public function PerfilAdmin(){
        $taller = DB::table('taller')
            ->join('horariotaller','taller.idTaller','=','horariotaller.taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.made_year','taller.NAlumnos',
            'horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia','docente.Nombre','docente.Apellidos')
            ->get();
        
        return view('system.profile',['taller'=>$taller]);
    }

    public function PerfilDocente(){

        $nombreDocente = session('nombre');
        $apellidos = session('apellidos');


        $taller = DB::table('taller')
            ->join('horariotaller','taller.idTaller','=','horariotaller.taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.made_year','taller.NAlumnos','horariotaller.HoraInicio',
            'horariotaller.HoraFin','horariotaller.Dia','docente.Nombre','docente.Apellidos','docente.idDocente')
            ->where('docente.Nombre',$nombreDocente)
            ->where('docente.Apellidos',$apellidos)
            ->get();
        
        foreach($taller as $item){
            $idDocente = $item->idDocente;
        }
        
        session(['idDocente'=>$idDocente]);
        return view('system.profile',['taller'=>$taller]);
    }

    public function PerfilAlumno(){
        $ncontrol = session('identificador');
       
        $taller = DB::table('taller')
            ->join('horariotaller','taller.idTaller','=','horariotaller.taller')
            ->join('alumno','taller.idTaller','=','alumno.Taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.made_year',
            'horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia','docente.Nombre','docente.Apellidos')
            ->where('alumno.NControl',$ncontrol)
            ->get();
        
        return view('system.profile',['taller'=>$taller]);
    }

    public function Talleres(){

        $fecha = date('Y');
        $mes = date('m');

        if($mes < 6){
            $periodo = 'Enero-Junio';
        }else{
            $periodo = 'Agosto-Diciembre';
        }

        $taller = DB::table('taller')
            ->join('horariotaller','taller.idTaller','=','horariotaller.taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.made_year','taller.NAlumnos',
            'horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia','docente.Nombre','docente.Apellidos')
            ->where('taller.made_year',$fecha)
            ->where('taller.periodo',$periodo)
            ->get();

        return view('system.registro_alumno',['taller'=>$taller]);
    }

    public function InscTaller(Request $request){
        $validacion = $request->validate([
            'nombre' => 'required|string',
            'ncontrol'=> 'required|integer',
            'apellidos' => 'required|string',
            'taller' => 'required|string'
        ]);

        $inscrito = DB::table('Alumno')
        ->where('NControl',$request->ncontrol)
        ->where('Taller',$request->taller)
        ->count();

        if($inscrito == 1){
    
            $inscritoTaller = array(
                'inscrito'=>'Ya te has inscrito al taller'
            );
            return back()->with($inscritoTaller);
        }

        $totalAlumnos = DB::table('alumno')->where('Taller',$request->taller)->count();

        $permitidos = DB::table('taller')->select('NAlumnos')->where('idTaller',$request->taller)->get();

        if((string)$totalAlumnos < $permitidos){

            $alumno = new Alumnos;
            $alumno->Ncontrol = $request->ncontrol;
            $alumno->Nombre = $request->nombre;
            $alumno->Apellidos = $request->apellidos;
            $alumno->Carrera = $request->carrera;
            $alumno->Semestre = $request->semestre;
            $alumno->Taller = $request->taller;
            $alumno->save();

            //$usuarios = new Usuarios;
            $user = DB::table('Usuarios')
            ->where('Nick',$request->ncontrol)
            ->update(['regComp','si']);

            $notificacion = array(
                'mensajeToast'=>'Te has inscrito al taller'
            );
            return back()->with($notificacion);
        }else{
            $grupolleno = array(
                'grupolleno'=>'El grupo llego las maximo de alumnos'
            );
            return back()->with($grupolleno);
        }
    }
}
