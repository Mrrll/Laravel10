@extends('layouts.plantilla')

@section('title', 'Cursos create ')

@section('content')
    <main class="container center_container container-float">
        <a class="btn btn-success btn-float btn-position-top-0-left-0 m-2" href="{{ route('cursos.index') }}">Volver</a>
        <form action="{{route('cursos.store')}}" method="post">
            @csrf
            @include('cursos.partials.form')
        </form>
    </main>
@endsection
