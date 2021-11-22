@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/camb_eva">
        @csrf
        <h1 class="titulo">Buscar Evaluador</h1>
        <div class="section">
            <h3>CEDULA EVALUADOR:</h3>
            <input class="field" type="text" ID="ID" name="ID" placeholder="Ingrese cedula" value="{{$respuesta->ID}}">
            <br>
            <br>
            <input type="submit" name="buscar"> <br>
            <br>
        </div>
        @if ($respuesta->hayDatos)
            @foreach ($respuesta->evaluaciones as $item)
                <table width="50%" class="tablita">
                    <tr>
                        <td>
                            <p class="center">Evaluador:</p>
                        </td>
                        <td>
                            <h3> {!! $item->cc_evaluador !!}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="center">Nombre:</p>
                        </td>
                        <td>
                            <h3>{!! $item->nombre_evaluador !!}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="center">Evaluado 1:</p>
                        </td>
                        <td>
                            <h3>{!! $item->cc_evaluado !!}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="center">Nombre:</p>
                        </td>
                        <td>
                            <h3>{!! $item->nombre_evaluado !!}</h3>
                        </td>
                    </tr>
                    <tr>
                </table>
                <br/><br/><br/>
            @endforeach
            <h1 class="titulo">Nuevo evaluador</h1>
            <div class="section">
                <h3>CEDULA EVALUADOR:</h3>
                <input class="field" type="text" ID="ID" name="N_ID" placeholder="Ingrese cedula" />
                <input type="submit" name="buscar" />
            </div>
            @if($respuesta->actualizados)
            <div class="section">
                Se actualizaron los datos ;
            </div>
            @endif
        @endif
    </form>

@endsection
