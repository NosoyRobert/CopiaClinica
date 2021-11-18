<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class AdministradorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar(Request $request)
    {
        $grupos = DB::select("select * from grupo");

        if ($request->isMethod('get')) {
            return view('empleado.registrar')->with('grupos', $grupos);
        } else if ($request->isMethod('post')) {
            $registrar = DB::insert("INSERT INTO
        empleado(documento,nombrecom,cargo,grupo)
        VALUES
        ('$request->cedula',
        '$request->nombre',
        '$request->grupo',
        '$request->cargo')");
            return  redirect('/empleado/registrar');
        }
    }

    public function insertar_datos($documento, $nombrecom, $cargo, $grupo)
    {
        global $con;

        $registrar_sql = DB::insert("INSERT INTO empleado(documento,nombrecom,cargo,grupo) VALUES ($documento, $nombrecom, $cargo, $grupo)");
        $resul=mysqli_query($con, $registrar_sql);

        set_time_limit(500);
        return $resul;
    }
    
    public function eliminar(Request $request)
    {
        $eliminar = DB::delete("DELETE FROM 
        empleado WHERE 
        id = ?", [$request->ID]);

        return view('admin.eliminar')->with('eliminar', $eliminar);
    }

    public function intentos(Request $request)
    {
        $intento = DB::delete("DELETE FROM 
        respuesta_pregunta 
        WHERE 
        id = ?", [$request->ID]);

        return view('admin.intentos')->with('intento', $intento);
    }

    public function mostrar()
    {
        $mostrar_empleados = DB::select("SELECT 
        em.documento as cedula,
        em.nombrecom as nombre_empleado,
        c.descripcion as cargo_empleado,
        g.nombre as grupo_empleado
        FROM empleado em
        inner join cargo c on c.id = em.cargo
        INNER JOIN grupo g on g.id = em.grupo
        ");
        return view('admin.mostrar')->with('mostrar_empleados', $mostrar_empleados);
    }

    function importar(Request $request)
    {
        $file = $request->archivo->store('importar');

        $fp = fopen(storage_path($file), 'r');//abrir archivo
        $rows = 0;//contador de filas

        while($datos = fgetcsv($fp, 1000, ";"))
        {
            $rows ++;
            echo $datos[0]. " ".$datos[1]. " ".$datos[2]. " ".$datos[3]. " ".$datos[4]. " ".$datos[5]."<br>";
        }
    }

    protected function storeImage(Request $request) 
    {
        $path = $request->file('archivo')->store('public/profile');
        return substr($path, strlen('public/'));
    }
}
