@extends('layouts.plantilla')

@section('title', 'Cursos '. $curso->name)

@section('content')
    <main class="container">
        <h1>Bienvenido al curso {{$curso->name}} </h1>
        <a class="btn btn-success ml-2" href="{{url()->previous()}}">Volver a Cursos</a>
        <p><strong>Categoria : </strong>{{$curso->categoria}}</p>
        <p>{{$curso->description}}</p>
    </main>
@endsection
