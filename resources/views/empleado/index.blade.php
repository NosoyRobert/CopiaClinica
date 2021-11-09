@extends('layout.main')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Mensajes</h2>
            </div>
            @if (!isset($mensajes))
                <div>No hay Mensajes</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mensajes as $mensaje)
                            <tr>
                                <td>{!! $mensaje->id !!}</td>
                                <td>{!! $mensaje->evaluado !!}</td>
                                <td>{!! $mensaje->evaluador ? 'Pendiente' : 'Respondido' !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection