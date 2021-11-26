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
@php($numeroPregunta=0)
@php($promedioTotal=0)

    <div>
        Evaluado: {{$respuestas[0]->evaluado}}<br/>
        Evaluador: {{$respuestas[0]->evaluador}}<br/>
        Cargo: {{$respuestas[0]->tipo_evaluacion}}<br/>
    </div>
<hr/>
<table  style="margin-top: 5px">
    <thead>
        <th>Pregunta:</th>
        <th>Puntaje:</th>
    </thead>
    <tbody>
        @foreach ($respuestas as $pregunta)
        @php ($numeroPregunta++)
        <tr>
            <td colspan="2">
                @if ($grupo != $pregunta->grupo_pregunta)
                    {{ $grupo = $pregunta->grupo_pregunta }}
                @endif
            </td>
        </tr>
        <tr>
            <td>
                {!! $pregunta->pregunta !!}
            </td>
            <td>
                {!! $pregunta->puntajevaluacion_pregunta !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>