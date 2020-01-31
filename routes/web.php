<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/singin','PublicController@Form_login')->name('singin');

Route::post('main','PublicController@login_init')->name('main');

Route::get('registrarse','PublicController@Form_registro')->name('registrarse');

Route::post('/registro','PublicController@Registro')->name('registro');

Route::get('recuperacionPassword','PublicController@ViewCambioPassword')->name('formCambio');

Route::post('cambioPassword','PublicController@CambioPassword')->name('cambioPassword');

Auth::routes();

Route::post('/','PublicController@Cerrar_Session')->name('salir');

Route::Resource('docente','DocentesController')->only([
    'index','store','update','destroy'
]);

Route::Resource('taller','TallerController')->only([
    'index','store','update','destroy','edit'
]);

Route::Resource('usuarios','UsuarioController')->only([
    'index','store','update','destroy'
]);

Route::Resource('alumnos','AlumnosController')->only([
    'index','store','update','edit','destroy'
]);

Route::Resource('tareas','TareasController')->only([
    'index','store','update','destroy'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('preregistro','SpecialController@Talleres')->name('preregistro');

Route::post('inscripcion','SpecialController@InscTallerRegistro')->name('inscripcion');

Route::post('sinscripcion','SpecialController@InscSoloTaller')->name('sinscripcion');

Route::get('profileStudent','SpecialController@PerfilAlumno')->name('profileStudent');

Route::get('profileTeacher','SpecialController@PerfilDocente')->name('profileTeacher');

Route::get('profileAdmin','SpecialController@PerfilAdmin')->name('profileAdmin');

Route::get('listTalleres','SpecialController@ListaTaller')->name('listTalleres');

Route::get('listasDocente','SpecialController@ListaDocente')->name('listaDocente');

Route::get('getListaTaller/{id}','SpecialController@getListaAlumnos')->name('getListaTaller');

Route::get('calificaciones','SpecialController@VistaCalificacion')->name('calificaiones');

Route::get('getAlumnosCalf/{taller}','SpecialController@getAlumnosCalificacion')->name('getAlumnosCalf');

Route::post('calificacion','SpecialController@Calificar')->name('calificacion');

Route::get('tareas','SpecialController@formTareas')->name('formtareas');

Route::get('listaTareas','SpecialController@ListaTareas')->name('listaTareas');

Route::get('tareasAlumno/{id}','SpecialController@TareasAlumnos')->name('tareasAlumno');

Route::post('upload','SpecialController@SubirTarea')->name('upload');

Route::get('grupoTareasAlumnos','SpecialController@GrupoTareaAlumnos')->name('listasTareasAlumnos');

Route::get('getTareas/{taller}','SpecialController@getTareas')->name('getTareas');

Route::post('download','SpecialController@Descargar')->name('download');

Route::get('talleresacreditados','SpecialController@ViewTallerAcreditados')->name('talleresacreditados');

Route::get('listaAcreditados/{taller}','SpecialController@ListaAcreditados')->name('listaAcreditados');

Route::get('constanciaCumplimiento','SpecialController@viewListaComplimiento')->name('consCumplimiento');

Route::get('alumnosCumplimiento/{taller}','SpecialController@viewAlumnosCumplimiento')->name('alumnosCumplimineto');

Route::get('getConstancia/{alumno}','SpecialController@getConsCumplimiento')->name('getConstancia');

//desempeño de actividades 
Route::get('desempeñoActividades','SpecialController@viewDesempenio')->name('viewdesempeño');

Route::get('desemAlumnos7{taller}','SpecialController@viewAlumnoDesempenio')->name('viewalumnos');

Route::get('getConsDesemp/{control}','SpecialController@getConsDesemp')->name('constDesemp');
