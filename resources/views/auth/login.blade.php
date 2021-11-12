@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
@endsection 

@section('content')
<body>
<div class="container">
    <div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Iniciar sesión</h3>
			<form action="{{ route('login') }}" method="post">
                @csrf
				<input type="text" placeholder="Cedula" required="" name="documento" required>
				<input type="password" placeholder="Contraseña" name="password" required>
				<input name="submit" type="submit" value="Ingresar">
			</form>				
		</div>
	</div>
</div>
</body>
@endsection
