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
            <h3>Resultados por Cedula: </h3>
            <input class="field" type="text" ID="ID" name="ID" value="{{$ID}}" placeholder="Ingrese una cedula">
            <input type="submit" name="calcular">
        </div>


    @if(count($respuesta)>0)
    @include('admin._informe-evaluacion', array('respuesta' => $respuesta))
    <input type="hidden" name="exportar" value="1"/>
    <button type="submit" name="submit" value="exportar" class="but" href="">EXPORTAR</button>
    @endif

</form>
@endsection
