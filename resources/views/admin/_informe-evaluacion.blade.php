<h4 class="titulo" style="margin-bottom: 5px"> Respuesta de evaluacion de Desempeño.</h4>
<div>
    Documento: {{ $respuesta[0]->cedula }}<br />
    Evaluado: {{ $respuesta[0]->evaluado }}<br />
    Cargo: {{ $respuesta[0]->cargo }}<br />
    Grupo: {{ $respuesta[0]->grupo_empleado }}
</div>
<hr class="hr">
@php($grupo = null)
@php($numeroPregunta = 0)
@php($promedioTotal = 0)
<table style="margin-top: 5px">
    <thead>
        <th>Pregunta</th>
        <th>Puntaje</th>
    </thead>
    <tbody>
        <tr>
            <td colspan="2"><br/></td>
        </tr>
        @foreach ($respuesta as $pregunta)
            @php($numeroPregunta++)
            @php($promedioTotal = $promedioTotal + $pregunta->promedio)
            <tr>
                <td colspan="2">
                    @if ($grupo != $pregunta->grupo_pregunta)
                        <b> {{ $grupo = $pregunta->grupo_pregunta }}</b>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    {{ $numeroPregunta }} - {!! $pregunta->pregunta !!}
                </td>
                <td>
                    {!! $pregunta->promedio !!}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td><b>Total final evaluacion</b></td>
            <td><b>{{ $promedioTotal / $numeroPregunta }}</b></td>
        </tr>
    </tfoot>
</table>
