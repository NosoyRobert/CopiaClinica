<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/empleado');
});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado');

Route::get('/empleado/evaluacion/{id}', [EmpleadoController::class, 'evaluacion']);

Route::post('/empleado/evaluacion/guardar', [EmpleadoController::class, 'guardar']);

Route::get('/empleado/evaluacion/respuesta/{id}', [EmpleadoController::class, 'respuesta']);

Route::get('/empleado/evaluacion/exportar/{id}', [EmpleadoController::class, 'exportar']);

Route::get('/empleado/perfil', [EmpleadoController::class, 'perfil']);

Route::post('/empleado/registrar', [AdministradorController::class, 'registrar']);

Route::get('/empleado/registrar', [AdministradorController::class, 'registrar']);

Route::get('/admin/eliminar', [AdministradorController::class, 'eliminar']);

Route::post('/admin/eliminar', [AdministradorController::class, 'eliminar']);

Route::get('/admin/intentos', [AdministradorController::class, 'intentos']);

Route::post('/admin/intentos', [AdministradorController::class, 'intentos']);

Route::get('/empleado/administrar', function (){
    return view('empleado.administrar');
});

Route::get('/admin/importar', function (){
    return view('admin.importar');
});

Route::post('/admin/importar/procesar', [AdministradorController::class, 'importar']);

Route::get('/admin/mostrar', [AdministradorController::class, 'mostrar']);

Route::get('/empleado/excel', [EmpleadoController::class, 'excel']);

Route::match(['get', 'post'],'/empleado/importar', [AdministradorController::class, 'insertar_datos']);

Route::match(['get', 'post'],'/empleado/buscar', [EmpleadoController::class, 'buscar']);

Route::match(['get', 'post'],'/empleado/actualizar', [EmpleadoController::class, 'actualizar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
