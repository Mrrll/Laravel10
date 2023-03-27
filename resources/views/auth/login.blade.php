@extends('layouts.plantilla')
@section('title', 'Sign In')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{ session('message')['message'] }}
            </x-alert>
        @endif
        <form action="{{ route('login.authenticate') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Acceso</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Password: <small class="text-primary">
                            <a href="{{ route('password.request') }}">Has olvidado tu contraseña?</a>
                        </small></label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="form-check form-switch d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="remember">
                        <label class="form-check-label ms-1" for="flexSwitchCheckDefault">Acuérdate de mí !!!</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Access</button>
                </div>
            </div>
        </form>
    </main>
@endsection
