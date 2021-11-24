@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/empleado/buscar">

        @csrf

        <h1 class="titulo">Buscar Empleados</h1>
        <div class="section">
        <h3>Buscar por cedula:  </h3>
        <input class="field" type="text" ID="ID" name="documento" placeholder="Cedula sin puntos">

        <br>

        <h3>Buscar por grupo:  </h3>
        <input class="field" type="text" ID="GR" name="GR" placeholder="Nombre Completo del grupo">

        <br>
        <br>

        <input type="submit" name="buscar">
        <br>
        <br>
        </div>

    
        <table width="80%" class="tablita"> 

        <tr>
            <td><p class="center">Nombre:</p></td>
            <td><p class="center">Cedula:</p></td>
            <td><p class="center">Grupo:</p></td>

        </tr>
        
        

        </table>
        
    
</form>

@endsection