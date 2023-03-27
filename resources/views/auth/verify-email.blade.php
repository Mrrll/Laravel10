@extends('layouts.plantilla')
@section('title', 'Email verify')

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
        <div class="alert alert-warning" role="alert">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <h4 class="alert-heading">Verificar email!</h4>
                <p><strong>Se le ha enviado un mensaje a su correo electrónico revise bandeja de entrada!</strong> Usted
                    debe de estar <strong>verificado</strong>, para que pueda visualizar el contenido de este sitio web,
                    pudiendo acceder a los artículos, contenidos exclusivos y las ventajas para nuestros usuarios, Usted
                    esta a un solo paso de poder disfrutar de una experiencia única,<strong> Adelante !!</strong></p>
                <hr>
                <p class="mb-0">Si el mensaje no le ha llegado asegúrese de que no este en la <strong>bandeja de spam</strong>, si no haga click en el siguiente botón y <strong>verifique su email</strong>. Tenga en cuenta que el enlace del mensaje caducara en 60 minutos. <button class="btn btn-warning"type="submit">Enviar mensaje de verificación</button></p>
            </form>
        </div>
    </main>
@endsection
