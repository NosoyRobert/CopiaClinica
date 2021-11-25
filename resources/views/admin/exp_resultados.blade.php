@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/exp_resultados">
        @csrf
        <h1 class="titulo">Resultados de Evaluacion</h1>
        <div class="section">
        <h3>Resultados por Cedula:  </h3>
        <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese una cedula">

        <br>
        <br>

        <input type="submit" name="calcular">
        <br>
        <br>
        </div>
    </form>

@endsection