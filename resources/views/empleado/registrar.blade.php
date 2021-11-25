@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/evaluacion.css') }}"> 
@endsection 
@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form method="POST" action="/empleado/registrar/">
        @csrf
        <h1 class="titulo"> REGISTRAR PERSONAL </h1>
        <br>

            

            <p class="center">Debe completar todos los datos para poder registrarlos</p><br><br>

        <hr class="hr">
        <div class="section">
        <h3 class="sex">DATOS DE REGISTRO:</h3>

        <br>

                <!--  cedula  -->


                <p class="bren";>CEDULA:  </p>
                <input class="field" type="text" id="cedula" name="cedula" placeholder="Solo Numeros">
                
                <br>
                <br>

                <!--  celular -->


                <p class="bren";>NOMBRE:  </p>
                <input class="field" type="text" id="nombre" name="nombre" placeholder="Nombre Completo">

                <br>
                <br>

                <!--  grupo -->


                <p class="bren";>GRUPO - AREA:  </p>
                <div class="caja">
                    <select class="field" id="grupo" name="grupo" placeholder="Grupo-Area">
                        @foreach ($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <br>

                <!--  cargo -->


                <p class="bren";>CARGO:  </p>
                <div class="caja">
                    <select class="field" id="cargo" name="cargo" placeholder="CARGO">
                        @foreach ($cargos as $cargo)
                            <option value="{{$cargo->id}}">{{$cargo->descripcion}}</option>
                        @endforeach
                    </select>
                </div>

                <br><br><br>

                <p class="bren";>La contraseña es la misma cedula, para ingresar</p>


                <br>
                <br>
                <br>
                </div>
                <br><hr class="hr"><br/>
                            
                                <!--  Enviar  -->

                                <br>    
                            

                                </div>

                                    <input type="submit" name="registrar">
                                
        </form>


@endsection
