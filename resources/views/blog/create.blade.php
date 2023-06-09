@extends('layouts.dashboard')

@section('title', 'Crear Post')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <form action="{{ route('blog.store') }}" method="post" style="width: 100%" enctype="multipart/form-data">
            @csrf
            @include('blog.partials.form')
        </form>
    </main>
@endsection
