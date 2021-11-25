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
//ruta login
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
//ruta inicio
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado');
//ruta evaluaciones
Route::get('/empleado/evaluacion/{id}', [EmpleadoController::class, 'evaluacion']);
//guardar
Route::post('/empleado/evaluacion/guardar', [EmpleadoController::class, 'guardar']);
//ruta respuestas
Route::get('/empleado/evaluacion/respuesta/{id}', [EmpleadoController::class, 'respuesta']);
//ruta para exportar
Route::get('/empleado/evaluacion/exportar/{id}', [EmpleadoController::class, 'exportar']);
//ruta para perfil
Route::get('/empleado/perfil', [EmpleadoController::class, 'perfil']);
//ruta para registrar
Route::post('/empleado/registrar', [AdministradorController::class, 'registrar']);
//registrar get
Route::get('/empleado/registrar', [AdministradorController::class, 'registrar']);
//ruta para eliminar
Route::get('/admin/eliminar', [AdministradorController::class, 'eliminar']);
//ruta para eliminar get
Route::post('/admin/eliminar', [AdministradorController::class, 'eliminar']);
//ruta para elimina intentos
Route::get('/admin/intentos', [AdministradorController::class, 'intentos']);
//ruta para elimina intentos get
Route::post('/admin/intentos', [AdministradorController::class, 'intentos']);
//ruta admin
Route::get('/empleado/administrar', function (){
    return view('empleado.administrar');
});
//ruta importar
Route::get('/admin/importar', function (){
    return view('admin.importar');
});
//ruta importar evaluadores
Route::get('/admin/impo_evaluadores', function (){
    return view('admin.impo_evaluadores');
});

Route::get('/admin/impo_preguntas', function (){
    return view('admin.impo_preguntas');
});



//cambiar evaluador
Route::match(['get', 'post'],'/admin/camb_eva', [AdministradorController::class, 'camb_eva']);
//inactivar
Route::get('/admin/empleado/inactivar/{cedula}/{estado}',[AdministradorController::class, 'inactivarEmpleado']);
//importar
Route::post('/admin/importar/procesar', [AdministradorController::class, 'importar']);
//evaluadores impo
Route::post('/admin/impo_evaluadores/procesar', [AdministradorController::class, 'impo_evaluadores']);
//evaluadores impo
Route::match(['post'],'/admin/impo_evaluadores', [AdministradorController::class, 'asignarEvaluaciones']);
//ruta pregutnas
Route::post('/admin/impo_preguntas/procesar', [AdministradorController::class, 'impo_preguntas']);
//ruta preguntas
Route::match(['post'],'/admin/impo_preguntas', [AdministradorController::class, 'impo_preguntas']);

Route::get('/admin/exp_resultados', [AdministradorController::class, 'expo_resultados']);

Route::post('/admin/exp_resultados', [AdministradorController::class, 'expo_resultados']);

//ruta mostrar
Route::get('/admin/mostrar', [AdministradorController::class, 'mostrar']);

Route::get('/admin/excel', [AdministradorController::class, 'export']);
//match importa
Route::match(['get', 'post'],'/empleado/importar', [AdministradorController::class, 'insertar_datos']);
//match buscar
Route::match(['get', 'post'],'/empleado/buscar', [EmpleadoController::class, 'buscar']);

Route::match(['get', 'post'],'/empleado/buscar', [AdministradorController::class, 'Buscar_grupo']);

Route::match(['get', 'post'],'/admin/editar_preguntas', [AdministradorController::class, 'editar_preguntas']);
//match actualizar
Route::match(['get', 'post'],'/empleado/actualizar', [EmpleadoController::class, 'actualizar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/empleado/excel', [AdministradorController::class, 'export']);

Route::get('/empleado/matriz', [AdministradorController::class, 'matriz']);
