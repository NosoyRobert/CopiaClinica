@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/editar_preguntas">
        @csrf
        <h1 class="titulo">Colsultar para modificar por cargo</h1>
            <div class="section">
                <h3>CARGO:</h3>
                <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese el cargo">
        
                <br>
                <br>
        
                <input type="submit" name="preguntas">
                <br>
                <br>
                </div>
    </form>


@endsection