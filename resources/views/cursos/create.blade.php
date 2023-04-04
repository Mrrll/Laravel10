@extends('layouts.dashboard')

@section('title', 'Cursos create ')

@section('content-dashboard')
    <main class="container center_container container-float main-dashboard"> 
        <form action="{{route('cursos.store')}}" method="post">
            @csrf
            @include('cursos.partials.form')
        </form>
    </main>
@endsection
