<style>
    h1 {
        font-family: 'Oswald', sans-serif;
        font-weight: 200;
        text-transform: uppercase;
        text-decoration: none;
        color: #16151b;
        letter-spacing: 1px;
        display: inline-block;
        font-size: 35pt;
        text-align: center;
        margin: 30px 0px 30px 0px;
    }

    h1.titulo {
        text-align: center;
    }

    p {
        font-family: 'Oswald', sans-serif;
        text-align: center;
        font-size: 15pt;
    }

    p.si {
        font-family: 'Oswald', sans-serif;
        text-align: center;
        font-size: 12pt;
    }


    h3.sex {
        font-family: 'Oswald', sans-serif;
        font-weight: 200;
        text-transform: uppercase;
        text-decoration: none;
        color: #16151b;
        letter-spacing: 1px;
        display: inline-block;
        font-size: 15pt;
        text-align: center;
        margin: 30px 0px 30px 0px;
    }

    h3.si {
        font-family: 'Oswald', sans-serif;
        text-align: center;
        font-size: 17pt;
    }

</style>
{{ $grupo = null }}
<table>


</table>
@foreach ($respuestas as $pregunta)
    @if ($grupo != $pregunta->grupo_pregunta)
        <h3 class="sex">{{ $grupo = $pregunta->grupo_pregunta }}</h3>
    @endif
    <div>
        <p class="bren">{!! $pregunta->pregunta !!}</p>
        <p class="bren">{!! $pregunta->puntajevaluacion_pregunta !!}</p>
    </div>
@endforeach


<br /><br />
<hr class="hr" /><br />
