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
    return view('alumnos.index');
});

//grados ruta
Route::get('/grados', 'App\Http\Controllers\GrdGradoController@index');

Route::get('/grado/add', 'App\Http\Controllers\GrdGradoController@create');
Route::post('/grado/add', 'App\Http\Controllers\GrdGradoController@store');
Route::get('/grado/edit/{id}', 'App\Http\Controllers\GrdGradoController@edit');
Route::post('/grado/edit/{id}', 'App\Http\Controllers\GrdGradoController@update');
Route::get('/grado/view/{id}', 'App\Http\Controllers\GrdGradoController@show');
Route::post('/grado/delete/{id}', 'App\Http\Controllers\GrdGradoController@destroy');

//Materias ruta
Route::get('/materias', 'App\Http\Controllers\MatMateriaController@index');

Route::get('/materia/add', 'App\Http\Controllers\MatMateriaController@create');
Route::post('/materia/add', 'App\Http\Controllers\MatMateriaController@store');
Route::get('/materia/edit/{id}', 'App\Http\Controllers\MatMateriaController@edit');
Route::post('/materia/edit/{id}', 'App\Http\Controllers\MatMateriaController@update');
Route::get('/materia/view/{id}', 'App\Http\Controllers\MatMateriaController@show');
Route::post('/materia/delete/{id}', 'App\Http\Controllers\MatMateriaController@destroy');

//Alumnos ruta
Route::get('/alumnos', 'App\Http\Controllers\AlmAlumnoController@index');

Route::get('/alumno/add', 'App\Http\Controllers\AlmAlumnoController@create');
Route::post('/alumno/add', 'App\Http\Controllers\AlmAlumnoController@store');
Route::get('/alumno/edit/{id}', 'App\Http\Controllers\AlmAlumnoController@edit');
Route::post('/alumno/edit/{id}', 'App\Http\Controllers\AlmAlumnoController@update');
Route::get('/alumno/view/{id}', 'App\Http\Controllers\AlmAlumnoController@show');
Route::post('/alumno/delete/{id}', 'App\Http\Controllers\AlmAlumnoController@destroy');