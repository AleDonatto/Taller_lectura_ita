<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Docentes;
use App\Taller;
use App\HorarioTaller;

class TallerController extends Controller
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
        $docentes = DB::table('docente')->get();
        
        $taller = DB::table('taller')
        ->join('horariotaller','taller.idTaller','=','horariotaller.Taller')
        ->select('taller.idTaller','taller.Periodo','taller.Made_year','taller.NAlumnos','taller.Profesor','horariotaller.HoraInicio','horariotaller.HoraFin','horariotaller.Dia')
        ->get();

        return view('system.taller',['docente'=>$docentes],['taller'=>$taller]);
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
            'docente'=>'integer|required',
            'periodo'=>'string|required',
            'year'=>'integer|required',
            'dia'=>'string|required',
            'horainicio'=>'string|required',
            'horafin'=>'string|required',
            'alumnos'=>'integer|required'
        ]);

        $arry1 = str_split($request->horainicio,6);
        $arry2 = str_split($request->horafin,6);

        //return $arry1[1].' mas '.$arry2[1];
        
        if($arry1[1]=='PM' && $arry2[1]=='AM'){
            
            $notificacion = array(
                'errorTaller' => 'La hora de incio no puede ser mayor que la hora final'
            );
            return back()->with($notificacion);
        }else{

            $total = DB::table('taller')->count();
            $number = intval($total) +1;
            $idTaller = 'T'.$request->year.$request->periodo.(string)$number;

            $taller = new Taller;
            $taller->idTaller = $idTaller; 
            $taller->Periodo = $request->periodo;
            $taller->Made_year = $request->year;
            $taller->NAlumnos= $request->alumnos;
            $taller->Profesor = $request->docente;
            $taller->save();

            $horario = new HorarioTaller;
            $horario->HoraInicio = $request->horainicio;
            $horario->HoraFin = $request->horafin;
            $horario->Dia = $request->dia;
            $horario->Taller = $idTaller;
            $horario->save();

            $notificacion = array(
                'mensajeToast' => 'Taller Creado Correctamente'
            );
    
            return back()->with($notificacion);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        try{
            $taller = DB::table('taller')->where('idTaller',$request->idTallerDelete)->delete();

            $notificacion = array(
                'mensajeToast' => 'Datos eliminados correctamente'
            );
            return back()->with($notificacion);

        }catch(QueryException $ex){
            $notificacion = array(
                'mensajeToast' => 'No se puede eliminar el taller'
            );
    
            return back()->with($notificacion);
        }
    }
}
