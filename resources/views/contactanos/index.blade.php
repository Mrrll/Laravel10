@extends('layouts.plantilla')

@section('title', 'Contactanos')

@section('content')
    <main class="container center_container">
        <div class="card" style="width: 18rem;">
            <form action="{{ route('contactanos.store') }}" method="post">
                <div class="card-header text-center">
                    <h5>Déjanos un mensaje</h5>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-0">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" placeholder="Iñigo Casper" name="name">
                        @error('name')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="correo">
                        @error('correo')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Mensaje:</label>
                        <textarea class="form-control" rows="3" name="mensaje"></textarea>
                        @error('mensaje')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </div>
            </form>
        </div>
    </main>
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Enviado!</strong> Su email a sido enviado con éxito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
