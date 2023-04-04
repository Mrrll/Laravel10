@extends('layouts.dashboard')

@section('title', 'Crear Post')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        @include('layouts.components.alert')
        <form action="{{ route('blog.create') }}" method="post">
            @csrf
            @include('blog.partials.form')
        </form>
    </main>
@endsection
