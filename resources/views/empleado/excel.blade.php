@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <?php 
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=Matriz.xls');
        header('Pragma: no-cache');
        header('Expires: 0');

        echo'<table border=1>';
        echo'<tr>';
        echo'<th colspan=31>Matriz</th>';
        echo'</tr>';
        echo'<tr><th>cedula</th><th>nombre</th><th>grupo</th><th>cargo</th><th>celular</th><th>correo</th><th>direccion</th><th>edad</th><th>genero</th></tr>';

        echo'<tr>';
    echo '<td>'.$mostrar->cedula.'</td>';
    echo '<td>'.$mostrar->nombre_empleado.'</td>';
    echo '<td>'.$mostrar->cargo_empleado.'</td>';
    echo '<td>'.$mostrar->grupo_empleado.'</td>';
    echo '<td>'.$mostrar->direccion.'</td>';
    echo '<td>'.$mostrar->celular.'</td>';
    echo '<td>'.$mostrar->correo.'</td>';
    echo '<td>'.$mostrar->edad.'</td>';
    echo '<td>'.$mostrar->genero.'</td>';
    echo'</tr>';    
    ?>
@endsection