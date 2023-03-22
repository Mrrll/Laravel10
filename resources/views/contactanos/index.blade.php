@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <form action="{{ route('contactanos.store') }}" method="post">
                <div class="card-header text-center">
                    <h5>Déjanos un mensaje</h5>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Iñigo Casper">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" placeholder="name@example.com">
                        @error('correo')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje:</label>
                        <textarea class="form-control" rows="4"></textarea>
                        @error('mensaje')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('info'))
        <script>
            alert("{{ session('info') }}");
        </script>
    @endif
@endsection
