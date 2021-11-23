@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')
    <div>
        <h2> <?php echo 'DATOS PERSONALES'; ?> </h2>
        <div>
            <p>
            <table style="width:50%" class="center">
                <tr>
                    <td>
                        <h3> Nombre: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->nombre_empleado !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Cedula: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->cedula !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Grupo: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->grupo_empleado !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Cargo: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->cargo_empleado !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Celular: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->celular !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Correo: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->correo !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Direccion: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->direccion !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Edad: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->edad !!}<h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3> Genero: </h3>
                    </td>
                    <td>
                        <h3>{!! $perfil->genero !!}<h3>
                    </td>
                </tr>
            </table>
            </p>
            <div>
                <a href="/empleado/actualizar">Actualizar</a>
            </div>
            <div>      
                @if (Auth::user()->perfil == 1)         
                <a href="/admin/eliminar">Eliminar</a>
                @endif
            </div>
        </div>
    </div>
    <br><br>

@endsection
