@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section('content')
    <main class="container center_container container-float">
        <a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{route('cursos.show', $curso)}}">Volver</a>
        <form action="{{route('cursos.update', $curso)}}" method="post">
            @csrf
            @method('put')
            @include('cursos.partials.form')
        </form>
    </main>
@endsection
