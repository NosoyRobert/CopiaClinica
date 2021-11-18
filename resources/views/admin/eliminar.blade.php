@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/eliminar/">
        @csrf
        <h1 class="titulo">Eliminar Empleados</h1>
        <div class="section">
        <h3>Eliminar por cedula: </h3>
        <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese cedula sin puntos">

        <br>

        <input type="submit" name="eliminar">
        <br>
        <br>
        </div>
    </form>

@endsection