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
                <a class="btn btn-primary" href="{{ url()->previous() }}">Volver</a>
            </div>
        </div>
    </main>
@endsection
