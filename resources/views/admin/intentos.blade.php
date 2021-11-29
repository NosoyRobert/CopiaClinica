@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <br>
    <br>
    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/intentos/">
        @csrf
        <h1 class="titulo">Colsultar para borrar intentos</h1>
            <div class="section">
                <h3>CEDULA EVALUADOR: </h3>
                <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese cedula a consultar">
        
                <br>
                <br>
        
                <input type="submit" name="borrar">
                <br>
                <br>
                </div>

                @if(count($intento)>0)
                <table width="80%" class="tablita"> 
                <thead>
                    <tr>
                        <th><p class="center">ID:</p></th>
                        <th><p class="center">Evaluador:</p></th>
                        <th><p class="center">Cedula:</p></th>
                        <th><p class="center">Evaluado:</p></th>
                        <th><p class="center">Cedula:</p></th>
                        <th><p class="center">Cargo:</p></th>
                        <th><p class="center">Estado evaluacion:</p></th>
                        <th><p class="center">Boton</p></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($intento as $intentos)
                    <tr>
                        <td><p class="si">{!! $intentos->id!!}</p></td>
                        <td><p class="si">{!! $intentos->evaluador!!}</p></td>
                        <td><p class="si">{!! $intentos->evaluador_documento!!}</p></td>
                        <td><p class="si">{!! $intentos->evaluado!!}</p></td>
                        <td><p class="si">{!! $intentos->evaluado_documento!!}</p></td>
                        <td><p class="si">{!! $intentos->cargo_evaluado!!}</p></td>
                        <td><p class="si">{!! $intentos->estado_evaluacion!!}</p></td>
                        <td class="btn-group">
                            @if($intentos->estado_evaluacion == 1)
                                <a type="button" href="/admin/intentos/{{$intentos->evaluador_documento}}/{{$intentos->id}}/0"  data-dismiss="modal">BORRAR INTENTO</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
    </form>
@endsection