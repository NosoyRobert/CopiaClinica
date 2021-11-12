@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/evaluacion.css') }}"> 
@endsection 
@section('content')

    <form method="POST" action="/empleado/evaluacion/guardar">

            @csrf
            <input name="evaluacion" type="hidden" value="{{$evaluacion}}">
            <h1 class="titulo"> Evaluacion de Desempeño.</h1> <br>
            
            <br><br>

            <br><hr class="hr"><br><br>

            <p class="center">Debe asignar a cada item una calificación desde el grado 1 (nunca cumple), hasta el grado 10 (siempre cumple).</h1><br><br>

                <!--  Tabla - Escala  -->
                <table style="width:40%" class="one">
                <tr> 
                <caption><p class="center">ESCALA</p></caption> 
                </tr>
                <tr>
                    <td><p class="center">1,0</p></td>
                    <td><p class="center">1,9</p></td>
                    <td><p class="center">Muy Bajo</p></td>
                </tr>
                <tr>
                    <td><p class="center">2,0</p></td>
                    <td><p class="center">2,9</p></td>
                    <td><p class="center">Bajo</p></td>
                </tr>
                <tr>
                    <td><p class="center">3,0</p></td>
                    <td><p class="center">3,9</p></td>
                    <td><p class="center">Medio</p></td>
                </tr>
                <tr>
                    <td><p class="center">4,0</p></td>
                    <td><p class="center">4,8</p></td>
                    <td><p class="center">Alto</p></td>
                </tr>
                <tr>
                    <td><p class="center">4,9</p></td>
                    <td><p class="center">5,0</p></td>
                    <td><p class="center">Excelente</p></td>
                </tr>
                </table>



        <br><br><br><br><hr class="hr"><br/>
       
        {{$grupo=null;}}
        @foreach($preguntas as $pregunta)
            @if($grupo != $pregunta->grupo_pregunta)
                <h3 class="sex">{{$grupo=$pregunta->grupo_pregunta;}}</h3>
            @endif
                <div>
                    <p class="bren">{!! $pregunta->descripcion !!}</p>
                    <input type="number" min="1" max="5" placeholder="1-5" name="{{$pregunta->evaluacion_pregunta}}">
                </div>
        @endforeach
        <br><br><br>
        <br>
        <br>
            <input type="submit" name="register">
    </form>
@endsection