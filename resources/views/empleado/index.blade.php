@extends('layout.main')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>TABLA</h2>
            </div>
            @if (!isset($mensajes))
                <div>No hay Mensajes</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>CEDULA</th>
                            <th>EVALUADO</th>
                            <th>CARGO</th>
                            <th>GRUPO</th>
                            <th>EVALUADOR</th>
                            <th>CALIFICAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mensajes as $mensaje)
                            <tr>
                                <td>{!! $mensaje->nombrecom !!}</td>
                                <td>{!! $mensaje->documento !!}</td>
                                <td>{!! $mensaje->evaluado !!}</td>
                                <td>{!! $mensaje->descripcion !!}</td>
                                <td>{!! $mensaje->nombre !!}</td>
                                <td>{!! $mensaje->evaluador ? 'Pendiente' : 'Respondido' !!}</td>
                                <td class="btn-group"><button type="button" class="btn btn-default" data-dismiss="modal">EVALUAR</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection