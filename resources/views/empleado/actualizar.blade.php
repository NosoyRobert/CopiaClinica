@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 
@section('content')

<form method="POST" action="/empleado/evaluacion/actualizar/">

    <h1 class="titulo"> ACTUALIZACION </h1>
    <br>

        

        <p class="center">Debe completar todos los datos para poder actualizarlos</p><br><br>

	<hr class="hr">
	<div class="section">
    <h3 class="sex">DATOS PERSONALES:</h3>


      <br>
    
            <!--  celular -->


			<p class="bren">CELULAR:  </p>
            <input class="field" type="text" id="celular" name="celular" placeholder="Celular">

			<br>
			<br>

			<!--  correo -->


			<p class="bren">CORREO:  </p>
            <input class="field" type="email" id="correo" name="correo" placeholder="Correo">

			<br>
			<br>

			<!--  direccion -->


			<p class="bren">DIRECCION:  </p>
            <input class="field" type="text" id="direccion" name="direccion" placeholder="Direccion">

			<br>
			<br>

			<!--  edad -->


			<p class="bren">EDAD:  </p>
            <input class="field" type="text" id="edad" name="edad" placeholder="Edad">

			<br>
			<br>

			<!--  genero -->

			<p class="bren">GENERO:

			<br>
			<br>

            <label><input type="radio" name="genero" value= "M"> 
			Masculino(M)
			</label><br>

			<label><input type="radio" name="genero" value= "F"> 
			Femenino(F)
			</label><br>

			</p>

			<br>
			<br>

            <br>
			<br>
            <br>
            </div>
            <br><hr class="hr"><br/>

                            <!--  Enviar  -->

                            <br>    
                        

                            </div>

                                <input type="submit" name="actualizar">                            
    </form>

@endsection