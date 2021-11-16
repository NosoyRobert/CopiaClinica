@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 
@section('content')

<div>
    <h2> <?php echo "DATOS PERSONALES"; ?> </h2>
    <div>

    <p>

		<table style="width:50%" class="center">	
            <tr>
				<td><h3> Nombre: </h3> </td>
                <td><h3>{!! $mostrar->nombre_empleado !!}<h3></td>
            </tr>
            <tr>
				<td><h3> Cedula: </h3> </td>
                <td ><h3>{!! $mostrar->cedula !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Grupo: </h3> </td>
                <td ><h3>{!! $mostrar->grupo_empleado !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Cargo: </h3> </td>
                <td ><h3>{!! $mostrar->cargo_empleado !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Celular: </h3> </td>
                <td ><h3>{!! $mostrar->celular !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Correo: </h3> </td>
                <td ><h3>{!! $mostrar->correo !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Direccion: </h3> </td>
                <td ><h3>{!! $mostrar->direccion !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Edad: </h3> </td>
                <td ><h3>{!! $mostrar->edad !!}<h3></td>
            </tr>
			<tr>
				<td><h3> Genero: </h3> </td>
                <td ><h3>{!! $mostrar->genero !!}<h3></td>
            </tr>

            </table>

    </p>
    </div>
    </div>

	<br><br>

@endsection