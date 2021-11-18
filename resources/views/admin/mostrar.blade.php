@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <br><br><br>

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <?php $numero=0; ?>

    <br><br><br>

    <br><br><br>
    
    <table width="80%" class="tablita"> 

            

                <tr>
                    <td><p class="center">Cedula:</p></td>
                    <td><p class="center">Nombre:</p></td>
                    <td><p class="center">Cargo:</p></td>
                    <td><p class="center">Grupo:</p></td>
                    <td><p class="center">Estado:</p></td>

                </tr>

    <?php ?>
                @foreach($mostrar_empleados as $mostrar)
                <tr>
                    <td><p class="center">{!! $mostrar->cedula !!}</p></td>
                    <td><p class="center">{!! $mostrar->nombre_empleado !!}</p></td>
                    <td><p class="center">{!! $mostrar->cargo_empleado !!}</p></td>
                    <td><p class="center">{!! $mostrar->grupo_empleado !!}</p></td>
                    <td><p class="center">{!! $mostrar->estado !!}</p></td>
                    <td class="btn-group">
                        @if ($mostrar->estado ==0)
                            <a type="button" href="/admin/empleado/inactivar/{{$mostrar->cedula}}/1" data-dismiss="modal">activar</a>
                        @elseif($mostrar->estado == 1)
                            <a type="button" href="/admin/empleado/inactivar/{{$mostrar->cedula}}/0"  data-dismiss="modal">INACTIVAR</a>
                        @endif
                    </td>
                </tr>

                <?php $numero++;?>
                @endforeach


        <?php

    ?>
                <tr>
                    <td colspan="15"><p class="center">Registros Totales: <?php echo $numero; ?></p>
                </tr>
    </table>

@endsection