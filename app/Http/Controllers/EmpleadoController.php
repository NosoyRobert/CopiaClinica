<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    //
    public function index(){
        $documentoEmpleado = "1234";
        $evaluaciones = DB::select('SELECT * 
        FROM evaluacion ev 
        INNER JOIN empleado em ON ev.evaluador = em.id
        WHERE em.documento = ?', [$documentoEmpleado]);
        return view('empleado.index',['evaluaciones'=>$evaluaciones]);
    }

    public function index1()
    {
        $documentoEmpleado = "1234";
        $mensajes = DB::select('SELECT nombrecom, documento, evaluado, evaluador, descripcion, nombre
        FROM cargo, grupo, evaluacion ev
        INNER JOIN empleado em ON ev.evaluador = em.id
        WHERE em.documento = ?', [$documentoEmpleado]);
        //return view('mensajes.index', compact('mensajes'));
        return view('empleado.index')->with('mensajes',$mensajes);
    }
}
