@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <br>
    <br>
    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/intentos/">
        @csrf
        <h1 class="titulo">Colsultar para borrar intentos</h1>
            <div class="section">
                <h3>CEDULA EVALUADOR: </h3>
                <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese una B antes de la cedula">
        
                <br>
                <br>
        
                <input type="submit" name="borrar">
                <br>
                <br>
                </div>
    </form>

@endsection