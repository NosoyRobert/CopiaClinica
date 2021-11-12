@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/evaluacion.css') }}"> 
@endsection 

@section('content')
    <form>

        @csrf
        <h1 class="titulo"> Respuesta de evaluacion de Desempeño.</h1> <br>
        
        <br><br>

        <br><br><br><br><hr class="hr"><br/>

        {{$grupo=null;}}
        @foreach($respuestas as $pregunta)
            @if($grupo != $pregunta->grupo_pregunta)
                <h3 class="sex">{{$grupo=$pregunta->grupo_pregunta;}}</h3>
            @endif
                <div>
                    <p class="bren">{!! $pregunta->pregunta !!}</p>
                    <p class="bren">{!! $pregunta->puntajevaluacion_pregunta !!}</p>
                </div>
        @endforeach
        <br><br><br>
        <br>
        <br>
            
    </form>
@endsection