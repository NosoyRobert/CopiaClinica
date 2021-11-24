@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <form method="POST">
        @csrf
        <h1 class="titulo">Resultados de Evaluacion</h1>
        <div class="section">
        <h3>Resultados por Cedula:  </h3>
        <input class="field" type="text" ID="id_A" name="id_A" placeholder="Ingrese una A antes de la cedula">

        <br>
        <br>

        <input type="submit" name="calcular">
        <br>
        <br>
        </div>
    </form>

@endsection