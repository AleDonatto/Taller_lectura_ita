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

Route::post('/','PublicController@Registro')->name('registro');


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
    'index'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('preregistro','SpecialController@Talleres')->name('preregistro');

Route::post('inscripcion','SpecialController@InscTaller')->name('inscripcion');

Route::get('profileStudent','SpecialController@PerfilAlumno')->name('profileStudent');

Route::get('profileTeacher','SpecialController@PerfilDocente')->name('profileTeacher');

Route::get('profileAdmin','SpecialController@PerfilAdmin')->name('profileAdmin');
