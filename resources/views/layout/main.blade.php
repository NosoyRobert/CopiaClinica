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
		<img src="img/CN1.png" alt="logo Clinica Meta" width="800" height="200">
		<br>
	</header>	
	@if (Auth::check())
    <nav>
		<ul>
			<li><a href="/empleado">INICIO</a></li>
			<li><a href="profile.php?action=perfil">PERFIL</a></li>
			<li><a href="profile.php?action=exportar">EXPORTAR</a></li>
			<li><a href="profile.php?action=cerrar">CERRAR SESION</a></li>
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



