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
<table cellpadding=0 cellspacing=0 width=879 style="border-collapse:
collapse;table-layout:fixed;width:660pt">
    <thead height=26 style="mso-height-source:userset;height:20.1pt">
        <th colspan=2 height=26 class=xl1256105 style="border-right:1.0pt solid black;
        height:20.1pt">Pregunta</th>
        <th class=xl1276105 width=145 style="border-top:none;border-left:none;
        width:109pt">Puntaje</th>
        <hr/>
    </thead>
    <tbody>
        <tr>
            <td colspan="1"><br/></td>
        </tr>
        @foreach ($respuesta as $pregunta)
            @php($numeroPregunta++)
            @php($promedioTotal = $promedioTotal + $pregunta->promedio)
            <tr height=21 style="mso-height-source:userset;height:15.75pt">
                <td colspan=2 height=21 class=xl1286105 width=879 style="border-right:1.0pt solid black;
                height:15.75pt;width:660pt">
                    @if ($grupo != $pregunta->grupo_pregunta)
                        <b> {{ $grupo = $pregunta->grupo_pregunta }}</b><br/>
                        <br/>
                        <br/>
                    @endif
                </td>
            </tr>
            <tr height=45 style="mso-height-source:userset;height:33.75pt">
                <td colspan=2 height=40 class=xl786105 width=589 style="border-right:1.0pt solid black;
                height:30.0pt;width:442pt">
                <hr/>
                    {{ $numeroPregunta }} - {!! $pregunta->pregunta !!} <br/>
                    <br/>
                    <hr/>
                </td>
                <td class=xl1316105 width=145 style="border-top:none;border-left:none;
                width:109pt">
                <hr/>
                    {!! $pregunta->promedio !!}
                    <hr/>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr height=45 style="mso-height-source:userset;height:33.75pt">
            
            <td colspan=2 height=40 class=xl786105 width=589 style="border-right:1.0pt solid black;
            height:30.0pt;width:442pt">
                <b>Total final evaluacion</b>
                <hr/>
            </td>
            <td class=xl1316105 width=145 style="border-top:none;border-left:none;
            width:109pt">
            <hr/>
            {{ $promedioTotal / $numeroPregunta }}
            <hr/>
            </td>
        </tr>
        <tr>
            <td><b>Comentarios.</b></td>
            <td><textarea rows="10" cols="40"></textarea>
            </td>
        </tr>
    </tfoot>
</table>