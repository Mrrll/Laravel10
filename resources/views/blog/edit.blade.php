@extends('layouts.plantilla')

@section('title', 'Editar Post')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
        <form action="{{ route('blog.update', $post) }}" method="post">
            @csrf
            @method('put')
            @include('blog.partials.form')
        </form>
    </main>
@endsection
