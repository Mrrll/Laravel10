@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <main class="container">
        <h1>Bienvenido a la pagina cursos</h1>
        <ul>
            @foreach ($cursos as $curso)
                <li>
                    <a href="{{ route('cursos.show', $curso) }}">{{ $curso->name }}</a>
                </li>
            @endforeach
        </ul>
        {{ $cursos->links() }}
    </main>
@endsection
