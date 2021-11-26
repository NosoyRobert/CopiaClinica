@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <br>
    <br>
    <br>
    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/empleado/buscar">

        @csrf

        <h1 class="titulo">Buscar Empleados</h1>
        <div class="section">
        <h3>Buscar por cedula:  </h3>
        <input class="field" type="text" ID="ID" name="documento" placeholder="Cedula sin puntos">

        <br>

        <input type="submit" name="buscar">
        <br>
        <br>
        </div>    

    </form> 
@endsection