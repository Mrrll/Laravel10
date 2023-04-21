@extends('layouts.dashboard')

@section('title', 'User | ' . $user->name)

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <x-card style="width:100%;">
            <x-slot name="card_header" classheader="text-start">
                <h6><strong>Nombre : </strong> {{ $user->name }} </h6>
                <h6><strong>Email : </strong> {{ $user->email }} </h6>
                <h6><small>Number of Posts : .....</small></h6>
            </x-slot>
            <h5 class="card-title"><strong>Role :</strong></h5>
            @if ($user->roles)
                @foreach ($user->roles as $role)
                    <span class="badge bg-primary">
                        {{ $role->name }}
                    </span>
                @endforeach
            @endif
            <hr>
            <h5 class="card-title"><strong>Permissions :</strong></h5>
            @if ($user->permissions)
                @foreach ($user->permissions as $permission)
                    <span class="badge bg-dark bg-gradient">
                        {{ $permission->slug }}
                    </span>
                @endforeach
            @endif
            <x-slot name="card_footer" classfooter="text-body-secondary">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
            </x-slot>
        </x-card>
    </main>
@endsection
