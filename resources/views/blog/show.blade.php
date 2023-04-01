@extends('layouts.plantilla')

@section('title', 'Post | ' . $post->title)
@section('content')
    <main class="container-lg">
        @include('layouts.components.alert')
        <div class="card">
            <div class="card-header text-center">
                Bienvenido al post {{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->category->name }}</h5>
                <p class="card-text">{{ $post->body }} </p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between">
                <div class="row row-cols-3">
                    <a class="btn btn-warning" href="{{ route('blog.edit', $post) }}">Editar</a>
                    <form action="{{ route('blog.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger text-nowrap" type="submit">Eliminar Post</button>
                    </form>
                </div>
                <a class="btn btn-primary" href="{{ route('blog.index', $post) }}">Volver</a>
            </div>
        </div>
    </main>
@endsection
