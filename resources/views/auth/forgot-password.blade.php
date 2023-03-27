@extends('layouts.plantilla')
@section('title', 'Forgot Password')

@section('content')
    <main class="container center_container flex-column">
        @if (session('message'))
            <x-alert class="mb-2" type="{{ session('message')['type'] }}">
                <x-slot name="title">
                    {{ session('message')['title'] }}
                </x-slot>
                {{session('status')}}
            </x-alert>
        @endif
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="card" style="width: 18rem;">
                <div class="card-header text-center">
                    <h5>Forgot Password</h5>
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
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </main>
@endsection
