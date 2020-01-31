<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Alumnos;
Use App\Usuarios;
use App\Talleres;
use App\Evaluacion;
use App\Tareas;
use App\Inscripcion;
use App\TareasSubidas;
use Carbon\Carbon;

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
            ->join('inscripcion','taller.idTaller','=','inscripcion.Taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.made_year',
            'horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia','docente.Nombre','docente.Apellidos')
            ->where('inscripcion.Alumno',$ncontrol)
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

    public function InscTallerRegistro(Request $request){
        $validacion = $request->validate([
            'nombre' => 'required|string',
            'ncontrol'=> 'required|integer',
            'apellidos' => 'required|string',
            'taller' => 'required|string'
        ]);

        $totalAlumnos = DB::table('inscripcion')->where('Taller',$request->taller)->count();

        $permitidos = DB::table('taller')->select('NAlumnos')->where('idTaller',$request->taller)->get();

        if((string)$totalAlumnos < $permitidos){

            $alumno = new Alumnos;
            $alumno->Ncontrol = $request->ncontrol;
            $alumno->Nombre = $request->nombre;
            $alumno->Apellidos = $request->apellidos;
            $alumno->Carrera = $request->carrera;
            $alumno->Semestre = $request->semestre;
            $alumno->save();

            $hoy = date('Y-m-d');
            $inscripcion = new Inscripcion;
            $inscripcion->Alumno = $request->ncontrol;
            $inscripcion->Taller = $request->taller;
            $inscripcion->FechaInscripcion = $hoy;
            $inscripcion->save();


            //$usuarios = new Usuarios;
            $user = DB::table('usuarios')
            ->where('id',session('idUser'))
            ->update([
                'regComp'=>'si'
            ]);

            session(['registro'=>'si']);

            
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

    public function InscSoloTaller(Request $request){
        $validacion = $request->validate([
            'nombre' => 'required|string',
            'ncontrol'=> 'required|integer',
            'apellidos' => 'required|string',
            'taller' => 'required|string'
        ]);

        $fecha = date('Y');
        $mes = date('m');

        if($mes < 6){
            $periodo = 'Enero-Junio';
        }else{
            $periodo = 'Agosto-Diciembre';
        }

        $inscrito = DB::table('Inscripcion')
        ->join('taller','inscripcion.Taller','=','taller.idTaller')
        ->where('taller.Periodo',$periodo)
        ->where('taller.Made_year',$fecha)
        ->where('inscripcion.alumno',$request->ncontrol)
        ->count();

        if($inscrito >= 1){
    
            $inscritoTaller = array(
                'inscrito'=>'Ya te has inscrito a una taller en el presente perido'
            );
            return back()->with($inscritoTaller);
        }

        $totalAlumnos = DB::table('inscripcion')->where('Taller',$request->taller)->count();

        $permitidos = DB::table('taller')->select('NAlumnos')->where('idTaller',$request->taller)->get();

        if((string)$totalAlumnos < $permitidos){

            $inscripcion = new Inscripcion;
            $inscripcion->Alumno = $request->ncontrol;
            $inscripcion->Taller = $request->taller;
            $inscripcion->FechaInscripcion = now()->toDateString();;
            $inscripcion->save();
            
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

    public function ListaTaller(){
        $taller = DB::table('taller')
        ->join('Docente','taller.Profesor','=','docente.idDocente')
        ->select('taller.idTaller','taller.Periodo','taller.Made_year','taller.NAlumnos','docente.Nombre','docente.Apellidos')
        ->get();

        return view('system.listasTaller',['taller'=>$taller]);
    }

    public function ListaDocente(){
        $taller = DB::table('taller')
        ->select('taller.idTaller','Taller.Periodo','taller.Made_year','taller.NAlumnos')
        ->where('Profesor',session('idDocente'))
        ->orderBy('Made_year','desc')
        ->get();

        return view('system.listasDocente',compact('taller'));
    }

    public function getListaAlumnos($idTaller){
        $lista = DB::table('Alumno')
        ->join('Inscripcion','alumno.Ncontrol','=','inscripcion.Alumno')
        ->select('NControl','Nombre','Apellidos','Carrera','Semestre')
        ->where('inscripcion.Taller',$idTaller)
        ->orderBy('Apellidos')
        ->get();

        $taller = DB::table('taller')
        ->join('Docente','taller.Profesor','=','docente.idDocente')
        ->join('HorarioTaller','taller.idTaller','=','HorarioTaller.Taller')
        ->select('taller.Periodo','taller.Made_year','docente.Nombre','docente.Apellidos','horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia')
        ->where('taller.idTaller',$idTaller)
        ->get();

        foreach($taller as $item){
            $nombre = $item->Nombre;
            $apellidos = $item->Apellidos;
            $periodo = $item->Periodo;
            $peridoAnio = $item->Made_year;
            $inicio = $item->HoraInicio;
            $fin = $item->HoraFin;
            $dia = $item->Dia;
        } 

        $data=[
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'periodo' => $periodo,
            'periodoAnio' => $peridoAnio,
            'inicio' => $inicio,
            'fin' => $fin,
            'dia' => $dia
        ];

        $pdf = PDF::loadView('formatos.listaTaller',$data,compact('lista'))->setPaper('a4','landscape');
        return $pdf->stream('lista.pdf');

        //return view('formatos.listaTaller',compact('lista'));
    }

    public function VistaCalificacion(){
        $taller = DB::table('taller')
        ->select('taller.idTaller','Taller.Periodo','taller.Made_year','taller.NAlumnos')
        ->where('Profesor',session('idDocente'))
        ->orderBy('Made_year','desc')
        ->get();

        return view('system.calificaciones',compact('taller'));
    }

    public function getAlumnosCalificacion($taller){

        $alumnos = DB::table('alumno')
        ->join('inscripcion','alumno.Ncontrol','=','inscripcion.Alumno')
        ->select('NControl','Nombre','Apellidos','inscripcion.Taller')
        ->whereNotExists(function ($query){
            $query->select('evaluacion.Alumno')
            ->from('evaluacion')
            ->whereRaw('evaluacion.Alumno = alumno.Ncontrol');
        })
        ->where('inscripcion.Taller',$taller)
        ->orderBy('Apellidos')
        ->get();

        return view('system.calificaciones',compact('alumnos'));
    }

    public function Calificar(Request $request){
        
        $validator = Validator::make($request->all(), [
            'control'=>'required|string',
            'nombre'=>'required|string',
            'acredito'=>'required|string',
            'criterio1'=>'required|string',
            'criterio2'=>'required|string',
            'criterio3'=>'required|string',
            'criterio4'=>'required|string',
            'criterio5'=>'required|string',
            'criterio6'=>'required|string',
            'criterio7'=>'required|string'
        ]);

        if($validator->fails()){
            $notificationUser = array(
                'mensajeToast' => 'Ocurrio un problema, asegurese de llenar todos los campos' 
            );
            return back()->with($notificationUser);
        }

        $check = DB::table('evaluacion')
        ->where('alumno',$request->control)
        ->where('taller',$request->taller)
        ->count();

        if($check >= 1){
            $notificacionUser = array(
                'mensajeToast' => 'Este alumno ya a sido evaluado'
            );
            return back()->with($notificacionUser);
        }

        $evaluacion = new Evaluacion;
        $evaluacion->alumno = $request->control;
        $evaluacion->taller = $request->taller;
        $evaluacion->acredito = $request->acredito;
        $evaluacion->c1 = $request->criterio1;
        $evaluacion->c2 = $request->criterio2;
        $evaluacion->c3 = $request->criterio3;
        $evaluacion->c4 = $request->criterio4;
        $evaluacion->c5 = $request->criterio5;
        $evaluacion->c6 = $request->criterio6;
        $evaluacion->c7 = $request->criterio7;
        $evaluacion->save();


        $notificationUser = array(
            'mensajeToast' => 'Calificacion capturada'
        );
        return back()->with($notificationUser);
    }

    #crear tareas docentes
    public function formTareas(){
        $fecha = date('Y');
        $mes = date('m');

        if($mes < 6){
            $periodo = 'Enero-Junio';
        }else{
            $periodo = 'Agosto-Diciembre';
        }

        $taller = DB::table('taller')
            ->join('docente','taller.Profesor','=','docente.idDocente')
            ->select('taller.idTaller','taller.Periodo','taller.Made_year')
            ->where('taller.made_year',$fecha) // cambiar año
            ->where('taller.periodo',$periodo)
            ->where('taller.Profesor',session('idDocente'))
            ->get();
        
        return view('system.dTareas',compact('taller'));
    }

    public function ListaTareas(){
        $tareas = DB::table('taller')
        ->join('docente','taller.Profesor','=','docente.idDocente')
        ->join('tareas','taller.idTaller','=','tareas.tareaTaller')
        ->select('tareas.id','tareas.Titulo','tareas.Descripcion','tareas.FechaEntrega','tareas.tareaTaller')
        ->where('docente.idDocente',session('idDocente'))
        ->get();
        
        return view('system.dListaTareas',compact('tareas'));
    }

    public function TareasAlumnos($taller){

        $tareas = DB::table('tareas')
        ->select('tareas.id','tareas.Titulo','tareas.Descripcion','tareas.FechaEntrega')
        ->where('tareaTaller',$taller)
        ->get();

        return view('system.alumnosTareas',compact('tareas'));
    }

    public function SubirTarea(Request $request){
        $validacion = $request->validate([
            'ncontrol' => 'required|integer',
            'tarea' => 'required|integer',
            'fechaentrega' => 'required|string'
        ]);

        $checkTareas = DB::table('tareassubidas')
        ->where('alumno',$request->ncontrol)
        ->where('tarea',$request->tarea)
        ->count();

        $hoy = date('Y-m-d H:i:s');

        if($checkTareas >= 1){
            $mensajeToast = array(
                'mensajeToast' => 'Ya has subido esta Tarea anteriormente'
            );

            return back()->with($mensajeToast);
        }

        if( $request->fechaentrega > now()->toDateString() ){

            $tareassubidas = new TareasSubidas;
            $tareassubidas->alumno = $request->ncontrol;
            $tareassubidas->tarea = $request->tarea;
            $tareassubidas->archivo = $request->file('archivo')->store('public');
            $tareassubidas->descripcion = 'si';
            $tareassubidas->hora = $hoy;
            $tareassubidas->save();

            $notificationUser = array(
                'mensajeToast' => 'Tarea Suibida Correctamente' 
            );

            return back()->with($notificationUser);
        }else{
            $notificacionUser = array(
                'mensajeToast'=>'Se a cumplido la fecha de entrega de la tarea'
            );

            return back()->with($notificacionUser);
        }
    }

    public function GrupoTareaAlumnos(){
        $taller = DB::table('taller')
        ->select('taller.idTaller','Taller.Periodo','taller.Made_year','taller.NAlumnos')
        ->where('Profesor',session('idDocente'))
        ->orderBy('Made_year','desc')
        ->get();

        return view('system.listaDocenteTarea',compact('taller'));
    }

    public function getTareas($taller){

        $alumnos = DB::table('alumno')
        ->join('tareassubidas','alumno.Ncontrol','=','tareassubidas.alumno')
        ->join('tareas','tareassubidas.tarea','=','tareas.id')
        ->select('alumno.Ncontrol','alumno.Nombre','alumno.Apellidos','tareas.Titulo','tareassubidas.hora','tareassubidas.archivo')
        ->where('tareas.tareaTaller',$taller)
        ->orderBy('alumno.Apellidos')
        ->get();

        return view('system.listaDocenteTarea',compact('alumnos'));
    }

    public function Descargar(Request $request){
        //$ruta = '/public/0QCoEiu4Sbft9QefGWLmVc1R4H0UettGtN8sYrSv.pdf';

        return Storage::download($request->ruta);
    }

    public function ViewTallerAcreditados(){
        $taller = DB::table('taller')
        ->join('docente','taller.Profesor','=','docente.idDocente')
        ->select('taller.idTaller','taller.Periodo','taller.Made_year','docente.Nombre','docente.Apellidos')
        ->get();

        return view('system.alumnosAcreditados',compact('taller'));
    }

    public function ListaAcreditados($taller){

        $acreditados = DB::table('alumno')
        ->join('evaluacion','evaluacion.Alumno','=','alumno.Ncontrol')
        ->select('alumno.Ncontrol','alumno.Nombre','alumno.Apellidos','alumno.Carrera','alumno.Semestre')
        ->where([
            ['evaluacion.acredito','=','SI'],
            ['evaluacion.Taller','=',$taller],
        ])
        ->orderBy('alumno.Apellidos')
        ->get();

        //return view('formatos.listaAcreditados',compact('acreditados'));

        $pdf = PDF::loadView('formatos.listaAcreditados',compact('acreditados'));
        return $pdf->stream('acreditados.pdf');
    }

    //lista de cumplimiento
    public function viewListaComplimiento(){
        $taller = DB::table('taller')
        ->join('docente','taller.Profesor','=','docente.idDocente')
        ->select('taller.idTaller','taller.Periodo','taller.Made_year','docente.Nombre','docente.Apellidos')
        ->get();

        return view('system.consCumplimiento',compact('taller'));
    }

    public function viewAlumnosCumplimiento($taller){
        $alumnos = DB::table('alumno')
        ->join('evaluacion','alumno.Ncontrol','=','evaluacion.alumno')
        ->select('alumno.Ncontrol','alumno.Nombre','alumno.Apellidos','alumno.Carrera','alumno.Semestre')
        ->where([
            ['evaluacion.acredito','=','SI'],
            ['evaluacion.taller','=',$taller],
        ])
        ->get();

        return view('system.consCumplimiento',compact('alumnos'));   
    }

    public function getConsCumplimiento($control){
        $alumno = DB::table('inscripcion')
        ->join('alumno','inscripcion.Alumno','=','alumno.Ncontrol')
        ->join('taller','inscripcion.Taller','=','taller.idTaller')
        ->select('alumno.Ncontrol','alumno.Nombre','alumno.Apellidos','alumno.Semestre','alumno.Carrera',
        'taller.Periodo','taller.Made_year')
        ->where('alumno.Ncontrol',$control)
        ->get();

        $taller = DB::table('taller')
        ->join('inscripcion','taller.idTaller','inscripcion.Taller')
        ->join('docente','taller.Profesor','=','docente.idDocente')
        ->select('docente.Nombre','docente.Apellidos')
        ->where('inscripcion.Alumno',$control)
        ->get();

        foreach($alumno as $item){
            $control = $item->Ncontrol;
            $nombre =  $item->Nombre;
            $apellidos = $item->Apellidos;
            $semestre = $item->Semestre;
            $carrera = $item->Carrera;
            $periodo = $item->Periodo;
            $year = $item->Made_year;
        }

        foreach($taller as $item){
            $dNombre = $item->Nombre;
            $dApellidos = $item->Apellidos;
        }

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha = date('m');
        $mes = $meses[($fecha) - 1];

        $array = [
            'control'=>$control,
            'nombre'=>$nombre,
            'apellidos'=>$apellidos,
            'semestre'=>$semestre,
            'carrera'=>$carrera,
            'periodo'=>$periodo,
            'year'=>$year,
            'mes'=>$mes,
            'dNombre'=>$dNombre,
            'dApellidos'=>$dApellidos
        ];

        $pdf = PDF::loadView('formatos.consCumplimiento',$array);
        return $pdf->stream('cumplimiento.pdf');
    }

    //evaluacion de desempeño de las actividades complementarias

    public function viewDesempenio(){
        $taller = DB::table('taller')
        ->join('docente','taller.Profesor','=','docente.idDocente')
        ->select('taller.idTaller','taller.Periodo','taller.Made_year','docente.Nombre','docente.Apellidos')
        ->get();

        return view('system.desemActCompl',compact('taller'));
    }

    public function viewAlumnoDesempenio($taller){
        $alumnos = DB::table('alumno')
        ->join('evaluacion','alumno.Ncontrol','=','evaluacion.alumno')
        ->select('alumno.Ncontrol','alumno.Nombre','alumno.Apellidos','alumno.Carrera','alumno.Semestre')
        ->where([
            ['evaluacion.acredito','=','SI'],
            ['evaluacion.taller','=',$taller],
        ])
        ->orderBy('alumno.Apellidos')
        ->get();

        return view('system.desemActCompl',compact('alumnos'));
    }

    public function getConsDesemp($control){

        $alumno = DB::table('evaluacion')
        ->join('alumno','evaluacion.alumno','=','alumno.Ncontrol')
        ->join('taller','evaluacion.taller','=','taller.idTaller')
        ->select('alumno.Nombre','alumno.Apellidos','alumno.Ncontrol','alumno.Carrera',
        'taller.Periodo','taller.Made_year','evaluacion.c1','evaluacion.c2','evaluacion.c3',
        'evaluacion.c4','evaluacion.c5','evaluacion.c6','evaluacion.c7')
        ->where('evaluacion.alumno',$control)
        ->get();

        foreach($alumno as $item){
            $ncontrol = $item->Ncontrol;
            $nombre = $item->Nombre;
            $apellidos = $item->Apellidos;
            $carrera = $item->Carrera;
            $periodo = $item->Periodo;
            $year = $item->Made_year;
            $c1 = $item->c1;
            $c2 = $item->c2;
            $c3 = $item->c3;
            $c4 = $item->c4;
            $c5 = $item->c5;
            $c6 = $item->c6;
            $c7 = $item->c7;
        }

        $array = [
            'ncontrol' => $ncontrol,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'carrera' => $carrera,
            'periodo' => $periodo,
            'year' => $year,
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'c5' => $c5,
            'c6' => $c6,
            'c7' => $c7
        ];

        $pdf = PDF::loadView('formatos.consDesemp',$array);
        return $pdf->stream('cumplimiento.pdf');
    }

}

