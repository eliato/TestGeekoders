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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas empresa
Route::get('/empresa', 'EmpresasController@index');
Route::get('/empresa/create', 'EmpresasController@create')->name('create'); //form de registro
Route::get('/empresa/{empresa}/edit', 'EmpresasController@edit'); //edit
Route::get('/empresa/{empresa}/ver', 'EmpresasController@editt'); //ver

Route::post('/empresa', 'EmpresasController@store'); //envio post del form
Route::put('/empresa/{empresa}', 'EmpresasController@update'); //update
Route::delete('/empresa/{empresa}', 'EmpresasController@destroy');

//rutas empleados
Route::get('/empleados', 'EmpleadosController@index');
Route::get('/empleados/create', 'EmpleadosController@create')->name('create'); //form de registro

Route::post('/empleados', 'EmpleadosController@store'); //envio post del form