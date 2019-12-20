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

Route::post('loginuser','PublicController@login_init')->name('loginuser');

Route::get('registrarse','PublicController@Form_registro')->name('registrarse');

Route::post('/','PublicController@Registro')->name('registro');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
