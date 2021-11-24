@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <?php echo '<a href="/empleado/administrar"  class="but">Volver</a>'; ?>

    <form action="/admin/impo_evaluadores" class="formulariocompleto" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="archivo" class="form-control"/>
        <input type="submit" class="form-control" name="enviar">
    </form>

@endsection