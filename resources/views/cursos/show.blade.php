@extends('layouts.plantilla')

@section('title', 'Cursos '. $curso->name)

@section('content')
    <main class="container">
        <h1>Bienvenido al curso {{$curso->name}} </h1>
        <a class="btn btn-success ml-2" href="{{route('cursos.index')}}">Volver a Cursos</a>
        <a class="btn btn-warning" href="{{route('cursos.edit', $curso)}}">Editar Cursos</a>
        <p><strong>Categoria : </strong>{{$curso->categoria}}</p>
        <p>{{$curso->description}}</p>
        <form action="{{route('cursos.destroy', $curso)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Eliminar Curso</button>
        </form>
    </main>
@endsection
