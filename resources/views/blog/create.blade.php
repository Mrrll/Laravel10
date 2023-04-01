@extends('layouts.plantilla')

@section('title', 'Crear Post')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
        <form action="{{ route('blog.create') }}" method="post">
            @csrf
            @include('blog.partials.form')
        </form>
    </main>
@endsection
