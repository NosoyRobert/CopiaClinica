@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <br>
    <br>
    <br>
    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/admin/buscar_grupo">

        @csrf
        <h3>Buscar por grupo:  </h3>
        <input class="field" type="text" ID="GR" name="GR" placeholder="Nombre Completo del grupo">

        <br>
        <br>

        <input type="submit" name="buscar">
        <br>
        <br>
        </div>    

        @if(count($grupos)>0)
                <table width="80%" class="tablita"> 
        <thead>
            <tr>
                <th><p class="center">Nombre:</p></th>
                <th><p class="center">Cedula:</p></th>
                <th><p class="center">Grupo:</p></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
            <tr>
                <td><p class="si">{!! $grupo->nombre!!}</p></td>
                <td><p class="si">{!! $grupo->cedula!!}</p></td>
                <td><p class="si">{!! $grupo->grupo!!}</p></td>
            </tr>
            @endforeach
        </tbody>
        
        </table>
@endif
    </form> 
@endsection