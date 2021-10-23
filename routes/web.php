<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::post('login',"UsuariosController@Login")->name('login');
Route::get('salir',"UsuariosController@destroy")->name('salir');
//estudiantes
//registro
Route::get('estudiante_registro',"EstudianteController@index")->name('estudiantes');
Route::get('estudiante_lista/{id}',"EstudianteController@lista")->name('estudiantes_lista');
//crear estudiantes
Route::post('registro_estudiante',"EstudianteController@store")->name('registro_estudiantes');


//juego

Route::get('juego/{documento}',"EstudianteController@juego")->name('juego');
Route::get('niveles/{niveles}',"EstudianteController@niveles")->name('niveles');
Route::get('juego/{estudiante}/{juego}/{puntuacion}',"PuntuacionController@agregar_puntuacion")->name('juego_punto');
