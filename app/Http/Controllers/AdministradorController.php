<?php

namespace App\Http\Controllers;

use App\Exports\EmpleadoExport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;
use Excel;

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
        $resul = mysqli_query($con, $registrar_sql);

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
        g.nombre as grupo_empleado,
        em.estado as estado
        FROM empleado em
        inner join cargo c on c.id = em.cargo
        INNER JOIN grupo g on g.id = em.grupo
        ");
        return view('admin.mostrar')->with('mostrar_empleados', $mostrar_empleados);
    }

    function importar(Request $request)
    {
        $file = $request->archivo->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('uploads', $file, 'public');
        $conn = Storage::disk('public');
        $stream = $conn->readStream($path);
        $content = "";

        $cont = 0;
        $errores = 0;
        while (($line = fgets($stream, 2048)) !== false) {
            $datos = explode(";", $line);
            //echo $datos[0]. "<br/> ".$datos[1]. "<br/> ".$datos[2]. "<br/> ".$datos[3]. "<br/> ".$datos[4]."<br>";
            if ($this->insertarEmpleado($datos)) {
                $cont++;
            } else {
                $errores++;
            }
        }
        echo "Se insertaron correctamente : " . $cont . ", y se presetaron " . $errores . " errores";
        /* return response($content)
               ->withHeaders([
                    'Content-Type' => 'text/plain',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename ='.$file,
               ]);*/
    }

    private function insertarEmpleado($datos)
    {
        $password = Hash::make($datos[0]);
        try {
            DB::insert("INSERT INTO empleado(documento,nombrecom,cargo,grupo,password) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$password')");
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    function impo_evaluadores(Request $request)
    {
        $file = $request->archivo->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('uploads', $file, 'public');
        $conn = Storage::disk('public');
        $stream = $conn->readStream($path);
        $content = "";

        $cont = 0;
        $errores = 0;
        while (($line = fgets($stream, 2048)) !== false) {
            $datos = explode(";", $line);
            //echo $datos[0]. "<br/> ".$datos[1]. "<br/> ".$datos[2]. "<br/> ".$datos[3]. "<br/> ".$datos[4]."<br>";
            if ($this->insertar_evaluadores($datos)) {
                $cont++;
            } else {
                $errores++;
            }
        }
        echo "Se insertaron correctamente : " . $cont . ", y se presetaron " . $errores . " errores";
        /* return response($content)
               ->withHeaders([
                    'Content-Type' => 'text/plain',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename ='.$file,
               ]);*/
    }

    private function insertar_evaluadores($datos)
    {
        $password = Hash::make($datos[0]);
        try {
            DB::insert("INSERT INTO empleado(documento,nombrecom,cargo,grupo,password) VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$password')");
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function inactivarEmpleado($cedula, $estado)
    {
        if (Auth::user()->perfil == 1) {
            DB::update("UPDATE empleado SET estado=$estado WHERE documento = $cedula");
            return  redirect('/admin/mostrar');
        } else {
            return response('No esta autorizado', 403);
        }
    }

    public function export()
    {
        /*Excel::create('Filename', function($excel) {

        })->export('xls');*/
    }

    function impo_preguntas(Request $request)
    {
        $file = $request->archivo->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('uploads', $file, 'public');
        $conn = Storage::disk('public');
        $stream = $conn->readStream($path);
        $content = "";

        $cont = 0;
        $errores = 0;
        while (($line = fgets($stream, 2048)) !== false) {
            $datos = explode(";", $line);
            echo $datos[0] . "<br/> " . $datos[1] . "<br/> " . $datos[2] . "<br>";
            if ($this->insertar_preguntas($datos)) {
                $cont++;
            } else {
                $errores++;
            }
        }
        echo "Se insertaron correctamente : " . $cont . ", y se presetaron " . $errores . " errores";
        /* return response($content)
               ->withHeaders([
                    'Content-Type' => 'text/plain',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename ='.$file,
               ]);*/
    }

    private function insertar_preguntas($datos)
    {
        $password = Hash::make($datos[0]);
        $nombre_grupo = 0;
        try {
            DB::insert("INSERT INTO pregunta(descripcion,peso,grupo_pregunta) VALUES('$datos[0]','$datos[1]','$datos[2]')");
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function editar_preguntas(Request $request)
    {
        $editar = DB::select("SELECT
        descripcion
        FROM talentoh.pregunta 
        where grupo_pregunta = ?", [$request->ID]);

        return view('admin.editar_preguntas')->with('editar', $editar);
    }

    public function camb_eva(Request $request)
    {
        $respuesta['hayDatos'] = false;
        $respuesta['ID']=0;
        $respuesta['actualizados']=null;
        if ($request->isMethod('post')) {
            if ($request->input('N_ID') != null) {
                
                $update = " UPDATE evaluacion ev
                            INNER JOIN empleado em ON em.id = ev.evaluador
                            SET ev.evaluador = ?
                            WHERE em.documento = ?";
                            
                $select = "SELECT * FROM empleado WHERE documento = ?";
                $idNuevoEvaluador =  DB::table('empleado')->where('documento', $request->N_ID)->value('id');    
                $actualizados = DB::update($update,[$idNuevoEvaluador,$request->ID]) ;
                $respuesta['actualizados']=$actualizados;
            } else {
                $respuesta['hayDatos'] = true;
                $evaluaciones = DB::select("SELECT ev.*, 
                                            em.nombrecom as nombre_evaluado,
                                            em.documento as cc_evaluado,
                                            em2.nombrecom as nombre_evaluador,
                                            em2.documento as cc_evaluador
                                        FROM talentoh.evaluacion ev
                                         INNER JOIN empleado em ON em.id = ev.evaluado
                                         INNER JOIN empleado em2 ON em2.id = ev.evaluador
                                        WHERE em2.documento = ?", [$request->ID]);
                $respuesta['evaluaciones'] = $evaluaciones;          
                $respuesta['ID']=$request->ID;
                }
            }
            $respuesta = (object)$respuesta;
            return view('admin.camb_eva')->with('respuesta', $respuesta);        
    }

    public function asignarEvaluaciones(Request $request){

    
        $file = $request->archivo->getClientOriginalName();
        $path = $request->file('archivo')->storeAs('uploads', $file, 'public');
        $conn = Storage::disk('public');
        $stream = $conn->readStream($path);
        $content = "";
        $cont = 0;
        $errores = 0;
        while (($line = fgets($stream, 2048)) !== false) {
            $datos = explode(";", $line);
            for($i=1;$i<count($datos);$i++){
                $evaluador = $datos[0];
                $evaluado =$datos[$i];
                $idEvaluador = DB::table('empleado')->where('documento', $evaluador)->value('id');  
                $idEvaluado =   DB::table('empleado')->where('documento', $evaluado)->value('id');  
                echo $evaluado."-".$idEvaluado."<br/>";
               /* $tipoEvaluacion = $this->obtenerTipoEvalucion($evaluado);
                if($tipoEvaluacion!=null){
                    DB::insert("INSERT INTO evaluacion (evaluador,evaluado,tp_evaluado,estado) VALUES (?,?,?,0)",[$idEvaluador,$idEvaluado,$tipoEvaluacion]);
                }*/

            }
            if ($this->insertar_preguntas($datos)) {
                $cont++;
            } else {
                $errores++;
            }
        }
        echo "Se insertaron correctamente : " . $cont . ", y se presetaron " . $errores . " errores";
    }

    public function obtenerTipoEvalucion($documentoEmpleado){
        $sql = "SELECT 
        tp.id as tipo_evaluacion
        FROM talentoh.empleado e 
        inner JOIN cargo c ON c.id = e.cargo
        INNER JOIN grupo g ON g.id = e.grupo
        INNER JOIN tipo_evaluacion tp ON concat (c.descripcion) = tp.nombre
        WHERE documento = $documentoEmpleado;";
        $resultado = DB::select($sql);
        if(count($resultado)>0){
            return $resultado[0]->tipo_evaluacion;
        }return null;

    }
}
