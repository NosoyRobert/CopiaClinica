@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('content')

    <form method="POST" action="/empleado/actualizar/">
        @csrf
        <h1 class="titulo"> ACTUALIZACION </h1>
        <br>
        <p class="center">Debe completar todos los datos para poder actualizarlos</p><br><br>
        <hr class="hr">
        <div class="section">
            <h3 class="sex">DATOS PERSONALES:</h3>


            <!--  CARGO -->


			<p class="bren">CARGO:  </p>
            <input disabled class="field" type="text" id="cargo" name="cargo" placeholder="Cargo" value="{{$perfil->cargo_empleado}}">

			<br>
			<br>

			<!--  Grupo -->


			<p class="bren">GRUPO:  </p>
            <input disabled class="field" type="text" id="grupo" name="grupo" placeholder="Grupo" value="{{$perfil->grupo_empleado}}">

			<br>
			<br>

            <!--  celular -->


            <p class="bren">CELULAR: </p>
            <input class="field" type="text" id="celular" name="celular" placeholder="Celular" value="{{$perfil->celular}}">

            <br>
            <br>

            <!--  correo -->


            <p class="bren">CORREO: </p>
            <input class="field" type="email" id="correo" name="correo" placeholder="Correo" value="{{$perfil->correo}}">

            <br>
            <br>

            <!--  direccion -->


            <p class="bren">DIRECCION: </p>
            <input class="field" type="text" id="direccion" name="direccion" placeholder="Direccion" value="{{$perfil->direccion}}">

            <br>
            <br>

            <!--  edad -->


            <p class="bren">EDAD: </p>
            <input class="field" type="text" id="edad" name="edad" placeholder="Edad" value="{{$perfil->edad}}">

            <br>
            <br>

            <!--  genero -->

            <p class="bren">GENERO:

                <br>
                <br>

                <label>
                    <input type="radio" name="genero" value="M" value="{{$perfil->genero}}">
                    Masculino(M)
                </label>
                <br>
                <label>
                    <input type="radio" name="genero" value="F" value="{{$perfil->genero}}">
                    Femenino(F)
                </label><br>
            </p>

            <br>
            <br>

            <br>
            <br>
            <br>
        </div>
        <br>
        <hr class="hr"><br />

        <!--  Enviar  -->

        <br>


        </div>

        <input type="submit" name="actualizar">
    </form>

@endsection
