@extends('layouts.plantilla')
@section('title', 'Sign Up')

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
        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Registro</h5>
                </div>
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control" placeholder="User Name" value="{{ old('name') }}"
                            name="name">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" placeholder="example@example.com"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error('password')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Repite Password:</label>
                        <input type="password" class="form-control" id="repeat_password">
                        <div id="repeat_password_message" class="d-none invalid">
                            <small>*Los passwords no coinciden.</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </main>
@endsection
