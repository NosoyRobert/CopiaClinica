@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
<br/>
    <?php $cont=0; $eval=0; ?>
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="fi">EVALUACIONES</h1>
            </div>
            <br/>
            <br/>
            <br/>
            @if (!isset($evaluaciones))
                <div>No hay Mensajes</div>
            @else
                <table class="table" name="table">
                    <thead>
                        <tr >
                            <th>NOMBRE</th>
                            <th>CEDULA</th>
                            <th>EVALUADO</th>
                            <th>CEDULA</th>
                            <th>CARGO</th>
                            <th>ESTADO</th>
                            <th>CALIFICAR</th>
                            <th>EXPORTAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluaciones as $evaluacion)
                            <tr>
                                <td>{!! $evaluacion->evaluador !!}</td>
                                <td>{!! $evaluacion->evaluador_documento !!}</td>
                                <td>{!! $evaluacion->evaluado !!}</td>
                                <td>{!! $evaluacion->evaluado_documento !!}</td>
                                <td>{!! $evaluacion->cargo_evaluado !!}</td>
                                <td>{!! $evaluacion->estado_evaluacion ==0 ? 'Pendiente' : 'Completo' !!}</td>
                                <td class="btn-group">
                                    @if ($evaluacion->estado_evaluacion ==0)
                                        <a type="button" href="/empleado/evaluacion/{{$evaluacion->id}}" class="but" data-dismiss="modal">EVALUAR</a>
                                    @elseif($evaluacion->estado_evaluacion ==1)
                                        <a type="button" href="/empleado/evaluacion/respuesta/{{$evaluacion->id}}" class="but" data-dismiss="modal">VER</a>
                                    @endif
                                </td>
                                <td class="btn-group">
                                    @if ($evaluacion->estado_evaluacion ==1)
                                        <a type="button" href="/empleado/evaluacion/exportar/{{$evaluacion->id}}" class="but" data-dismiss="modal">EXPORTAR</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <br/>
            <br/>
            <br/>
            <br/>
            <hr/>
            <br/>
            <br/>
            <div>
                <h2> <?php echo "INFORMACION DE EVALUACIÓN"; ?> </h2>
                <div>
                <br/>
                <br/>
                <p>
            
                    <table style="width:40%" class="center">	
                        <tr>
                            <td><h3> NOTA FINAL: </h3> </td>
                            <td><h3></h3></td>
                        </tr>
                        <tr>
                            <td><h3> TOTAL EVALUADORES: </h3> </td>
                            <td ><h3> </h3></td>
                        </table>
                </p>
                <p>
                </p>
                </div>
            </div>



        </div>
    </div>
@endsection