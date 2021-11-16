<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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
    return view('layout.main');
});

Route::get('/empleado', [EmpleadoController::class, 'index']);

Route::get('/empleado/evaluacion/{id}', [EmpleadoController::class, 'evaluacion']);

Route::post('/empleado/evaluacion/guardar', [EmpleadoController::class, 'guardar']);

Route::get('/empleado/evaluacion/respuesta/{id}', [EmpleadoController::class, 'respuesta']);

Route::get('/empleado/evaluacion/exportar/{id}', [EmpleadoController::class, 'exportar']);

Route::get('/empleado/perfil/{id}', [EmpleadoController::class, 'perfil']);

Route::get('/empleado/actualizar/{id}', [EmpleadoController::class, 'actualizar']);

Route::get('/empleado/administrar/{id}', [EmpleadoController::class, 'administrar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
