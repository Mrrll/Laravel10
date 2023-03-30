@extends('layouts.plantilla')

@section('title', 'Perfil de Usuario')

@section('content')
    <main class="container center_container flex-column">
        @include('layouts.components.alert')
        <form action="{{ request()->routeIs('profile.crate') ? route('profile.store') : route('profile.update')}}" method="post">
            @csrf
            @if (request()->routeIs('profile.edit'))
                @method('put')
            @endif
            @include('users.partials.form_profile')
        </form>
    </main>
@endsection
