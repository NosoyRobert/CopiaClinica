<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Clinica Meta</title>
	<link rel="shortcut icon" href="img/favicon1.png">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@section('css')

	@show
<style>
@import url('https://fonts.googleapis.com/css?family=Oswald:500');
</style>
</head>
<body>
	<header>
		<img src="{{ URL::to('/') }}/img/CN1.png" alt="logo Clinica Meta" width="800" height="200">
		<br>
	</header>
	@if (Auth::check())
    <nav>
		<ul>
			<li><a href="/empleado">INICIO</a></li>
			<li><a href="/empleado/perfil">PERFIL</a></li>
            @if(Auth::user()->perfil == 1)
                <li><a href="profile.php?action=perfil">Administrador</a></li>
            @endif
			<li><a href="/logout">CERRAR SESION</a></li>

            <li>Hola, {{Auth::user()->nombrecom}}</li>
		</ul>
	</nav>
	@endif
	<section>
            @section('content')
                Hola mundo
            @show
	</section>


</body>
</html>



