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
    
    <form>

        @csrf
        <h1 class="titulo"> Respuesta de evaluacion de Desempeño.</h1> <br>
        
        <br><br>

        <br><br><br><br><hr class="hr"><br/>

        {{$grupo=null;}}
        @foreach($respuesta as $pregunta)
            @if($grupo != $pregunta->grupo_pregunta)
                <h3 class="sex">{{$grupo=$pregunta->grupo_pregunta;}}</h3>
            @endif
                <div>
                    <p class="bren">{!! $pregunta->pregunta !!}</p>
                    <p class="bren">{!! $pregunta->puntajevaluacion_pregunta !!}</p>
                </div>
                
        <div>
            <p class="caja">Promedio: {!! $pregunta->promedio !!}</p>
        </div>
        @endforeach
        <hr/>
        <br><br><br>
        <br>
        <br>
    </form>
    <a type="button" class="but" href="">EXPORTAR</a>

@endsection