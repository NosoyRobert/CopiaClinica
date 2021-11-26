<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class EmpleadoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $documentoEmpleado = Auth::user()->documento;
        $evaluaciones = DB::select('SELECT
        ev.id as id,
        em.nombrecom as evaluador,
        em.documento as evaluador_documento,
        em2.nombrecom as evaluado,
        em2.documento as evaluado_documento,
        c.descripcion as cargo_evaluado,
        ev.estado as estado_evaluacion,
        em.perfil as admins
        FROM evaluacion ev
        INNER JOIN empleado em ON ev.evaluador = em.id
        INNER JOIN empleado em2 ON ev.evaluado = em2.id
        inner join cargo c on c.id = em2.cargo
        WHERE em2.estado = 1 AND em.documento = ?', [$documentoEmpleado]);
        //return view('empleado.index', compact('evaluaciones'));
        return view('empleado.index')->with('evaluaciones', $evaluaciones);
    }

    public function evaluacion($id)
    {
        $resultado = DB::select('SELECT
        p.*,
        ep.id as evaluacion_pregunta,
        gp.nombre as grupo_pregunta
        FROM evaluacion e
        INNER JOIN tipo_evaluacion tp ON tp.id = e.tp_evaluado
        INNER JOIN tipo_evaluacion_pregunta ep ON ep.tipo_evaluacion = tp.id
        INNER JOIN pregunta p ON ep.pregunta = p.id
        INNER JOIN grupo_pregunta gp ON gp.id = p.grupo_pregunta
        WHERE e.id = ? ORDER BY gp.id, p.id', [$id]);
        return view('empleado.evaluacion')->with('preguntas', $resultado)->with('evaluacion', $id);
    }

    public function guardar(Request $request)
    {
        $id = $request->input('evaluacion');
        $resultado = DB::select('SELECT
        p.*,
        ep.id as evaluacion_pregunta,
        gp.nombre as grupo_pregunta
        FROM evaluacion e
        INNER JOIN tipo_evaluacion tp ON tp.id = e.tp_evaluado
        INNER JOIN tipo_evaluacion_pregunta ep ON ep.tipo_evaluacion = tp.id
        INNER JOIN pregunta p ON ep.pregunta = p.id
        INNER JOIN grupo_pregunta gp ON gp.id = p.grupo_pregunta
        WHERE e.id = ? ORDER BY gp.id, p.id', [$id]);

        foreach ($resultado as $pregunta) {
            $valor = $request->input($pregunta->evaluacion_pregunta);
            DB::insert("INSERT INTO respuesta_pregunta(evaluacion,evaluacion_pregunta,valor) VALUES ('$id','$pregunta->evaluacion_pregunta','$valor')");
        }
        DB::update("UPDATE evaluacion SET estado = 1 WHERE id = $id");
        echo "insertado";
    }

    public function respuesta($id)
    {

        $respuesta_eva = DB::select('SELECT
        e.id as evaluacion,
        e1.nombrecom as evaluador,
        e2.nombrecom as evaluado,
        te.nombre as tipo_evaluacion,
        gp.nombre as grupo_pregunta,
        p.descripcion as pregunta,
        r.valor as puntajevaluacion_pregunta
        FROM talentoh.respuesta_pregunta r
        INNER JOIN evaluacion e ON e.id = r.evaluacion
        INNER JOIN tipo_evaluacion_pregunta ep ON ep.id = r.evaluacion_pregunta
        INNER JOIN pregunta p ON p.id = ep.pregunta
        INNER JOIN tipo_evaluacion te ON te.id = ep.tipo_evaluacion
        INNER JOIN grupo_pregunta gp ON gp.id = p.grupo_pregunta
        INNER JOIN empleado e1 ON e.evaluado = e1.id
        INNER JOIN empleado e2 ON e.evaluador = e2.id
        WHERE e.id = ?', [$id]);
        return view('empleado.respuesta')->with('respuestas', $respuesta_eva);
    }

    public function exportar($id)
    {
        $respuesta_eva = DB::select('SELECT
        e.id as evaluacion,
        e1.nombrecom as evaluador,
        e2.nombrecom as evaluado,
        te.nombre as tipo_evaluacion,
        gp.nombre as grupo_pregunta,
        p.descripcion as pregunta,
        r.valor as puntajevaluacion_pregunta,
        r.fecha as fecha
        FROM talentoh.respuesta_pregunta r
        INNER JOIN evaluacion e ON e.id = r.evaluacion
        INNER JOIN tipo_evaluacion_pregunta ep ON ep.id = r.evaluacion_pregunta
        INNER JOIN pregunta p ON p.id = ep.pregunta
        INNER JOIN tipo_evaluacion te ON te.id = ep.tipo_evaluacion
        INNER JOIN grupo_pregunta gp ON gp.id = p.grupo_pregunta
        INNER JOIN empleado e1 ON e.evaluado = e1.id
        INNER JOIN empleado e2 ON e.evaluador = e2.id
        WHERE e.id = ?', [$id]);
        //return view('empleado.respuesta')->with('respuestas',$respuesta_eva);
        //view()->share('respuestas', $respuesta_eva);
        //$pdf = PDF::loadView('empleado.pdf', $respuesta_eva);
        return PDF::loadView('empleado.pdf', ["respuestas"=>$respuesta_eva])->stream('archivo.pdf');
        //return $pdf->download('archivo-pdf.pdf');
        //return view('empleado.pdf')->with('respuestas', $respuesta_eva);
    }

    public function actualizar(Request $request)
    {
        $mostrar = DB::select('SELECT
        em.documento as cedula,
        em.nombrecom as nombre_empleado,
        c.descripcion as cargo_empleado,
        g.nombre as grupo_empleado,
        em.direccion as direccion,
        em.celular as celular,
        em.correo as correo,
        em.edad as edad,
        em.genero as genero
        FROM empleado em
        inner join cargo c on c.id = em.cargo
        INNER JOIN grupo g on g.id = em.grupo
        WHERE em.id = ?', [Auth::user()->id]);
        $mostrar = $mostrar[0];

        if ($request->isMethod('get')) {
            return view('empleado.actualizar')->with('perfil', $mostrar);
        } else if ($request->isMethod('post')) {
            $actualizar = DB::update("UPDATE
                                    empleado
                                    SET
                                    cargo='$request->cargo',
                                    grupo='$request->grupo',
                                    direccion='$request->direccion',
                                    celular='$request->celular',
                                    correo='$request->correo',
                                    edad='$request->edad',
                                    genero='$request->genero'
                                    WHERE id = ?", [Auth::user()->id]);
                                }
        return  redirect('/empleado/perfil');
    }

    private function getDatosEmpleado($cedula){
        $mostrar = DB::select('SELECT
        em.documento as cedula,
        em.nombrecom as nombre_empleado,
        c.descripcion as cargo_empleado,
        g.nombre as grupo_empleado,
        em.direccion as direccion,
        em.celular as celular,
        em.correo as correo,
        em.edad as edad,
        em.genero as genero
        FROM empleado em
        inner join cargo c on c.id = em.cargo
        INNER JOIN grupo g on g.id = em.grupo
        WHERE em.documento = ?', [$cedula]);
        $mostrar = $mostrar[0];
        return $mostrar;
    }

    public function perfil()
    {
       $mostrar = $this->getDatosEmpleado(Auth::user()->documento);
        return view('empleado.perfil')->with('perfil', $mostrar);
    }

    public function registrar(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('empleado.registrar');
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

    public function buscar(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('empleado.buscar');
        } else if ($request->isMethod('post')) {
            $mostrar = $this->getDatosEmpleado($request->documento);
            return view('empleado.perfil')->with('perfil', $mostrar);
        }
    }
}
