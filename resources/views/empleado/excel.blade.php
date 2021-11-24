@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@endsection 

@section('content')
    <?php 

        $sheet->setAutoFilter();
        $sheet->setWidth('A', 5);
        $sheet->setHeight(1, 50);
        $sheet->setSize('A1', 500, 50);
        // Set auto size for sheet
        $sheet->setAutoSize(true);
    ?>
@endsection