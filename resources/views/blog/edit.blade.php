@extends('layouts.dashboard')

@section('title', 'Editar Post')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        @include('layouts.components.alert')
        <form action="{{ route('blog.update', $post) }}" method="post">
            @csrf
            @method('put')
            @include('blog.partials.form')
        </form>
    </main>
@endsection
