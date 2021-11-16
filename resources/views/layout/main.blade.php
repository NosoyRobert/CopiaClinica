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
			<li><a href="profile.php?action=cerrar">CERRAR SESION</a></li>
		</ul>
	</nav>
	@endif	
	<section>
            @section('content')
                
			@if (!isset($evaluaciones))
				<div>No hay Mensajes</div>
				@else	
					<table class="table">
						<thead>
							<tr>
								<th>ADMINISTRADOR</th>
							</tr>
						</thead>
						<tbody>
							@foreach($evaluaciones as $evaluacion)
								<tr>
									<td>{!! $evaluacion->admins ==0 ? 'NO' : 'SI' !!}</td>
									<td class="btn-group">
										@if ($evaluacion->admins ==1)
											<a type="button" href="/empleado/evaluacion/administrar/{id}" class="btn btn-default" data-dismiss="modal">ADMINISTRAR</a>
										@endif
									</td>								
								</tr>
							@endforeach
						</tbody>
					</table>
					@endif

            @show
	</section>


</body>
</html>



