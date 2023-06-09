@extends('layouts.dashboard')

@section('title', 'Editar Post')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <form action="{{ route('blog.update', $post) }}" method="post" style="width: 100%" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('blog.partials.form')
        </form>
    </main>
@endsection
