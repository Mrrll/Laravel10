@extends('layouts.dashboard')

@section('title', 'Cursos edit')

@section('content-dashboard')
    <main class="container center_container container-float main-dashboard">
        <form action="{{route('cursos.update', $curso)}}" method="post">
            @csrf
            @method('put')
            @include('cursos.partials.form')
        </form>
    </main>
@endsection
