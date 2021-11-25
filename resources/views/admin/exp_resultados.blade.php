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
            <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese una cedula">
            <input type="submit" name="calcular">
        </div>
    </form>

    @if(count($respuesta)>0)
    <form>
        @csrf
        <h4 class="titulo" style="margin-bottom: 5px"> Respuesta de evaluacion de Desempeño.</h4>
        <div>
            Documento: {{$respuesta[0]->cedula}}<br/>
            Evaluado: {{$respuesta[0]->evaluado}}<br/>
            Cargo: {{$respuesta[0]->cargo}}<br/>
            Grupo: {{$respuesta[0]->grupo_empleado}}
        </div>
        <hr class="hr">
        {{ $grupo = null }}
        <table style="margin-top: 5px">
            <thead>
                <th>Pregunta</th>
                <th>Puntaje</th>
            </thead>
            <tbody>
                @foreach ($respuesta as $pregunta)
                    <tr>
                        <td colspan="2">
                            @if ($grupo != $pregunta->grupo_pregunta)
                                <b> {{ $grupo = $pregunta->grupo_pregunta }}</b>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! $pregunta->pregunta !!}
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
                   <td><b>{{$respuesta[0]->promedio}}</b></td>
                </tr>
            </tfoot>
        </table>
    </form>
    @endif
    <a type="button" class="but" href="">EXPORTAR</a>

@endsection
