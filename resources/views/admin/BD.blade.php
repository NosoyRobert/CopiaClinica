@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

<?php 
    $archivo = $_FILES["archivo"]["name"];
    $archivo_copiado = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "copia_".$archivo;

    //echo $archivo;
    //echo $archivo. "Esta en la ruta temportal. ".$archivo_copiado;

    if(copy($archivo_copiado, $archivo_guardado)) 
    {
        echo "<h1>Se copio correctamente a la carpeta</h1><br>";
    }else{
        echo "hubo un error<br>";
    }

    if(file_exists($archivo_guardado)) 
    {
        //echo "Si existe una copia<br>";
        $fp = fopen($archivo_guardado, "r");//abrir archivo
        $rows = 0;//contador de filas

        while($datos = fgetcsv($fp, 1000, ";"))
        {
            $rows ++;
            //echo $datos[0]. " ".$datos[1]. " ".$datos[2]. " ".$datos[3]. " ".$datos[4]. " ".$datos[5]."<br>";
            if($rows >= 1)
            {
                $resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
                if ($resultado) 
                {
                    echo "Se inserto los datos correctamente <br>";
                }
                    else{
                        echo "No se inserto<br>";
                    }
            }
        }
    }
    else{
        echo "No existe archivo<br>";
    }
?>
@endsection