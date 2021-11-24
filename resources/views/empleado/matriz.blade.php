@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')

    <form action="/empleado/matriz" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
    </form>

@endsection