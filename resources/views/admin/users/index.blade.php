@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        @include('layouts.components.alert')
        <x-card class="mt-2" classheader="d-flex justify-content-between">
            <x-slot name="card_header">
                <h1>List Users</h1>
                <div class="align-self-center">
                    <a href="{{ route('users.create') }}" class="btn btn-primary"> Create User</a>
                </div>
            </x-slot>
            {{-- Tabla --}}
            <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle"
                theadclass="table-dark">
                @foreach ($users as $user)
                    <tr class="{{ $user->id == auth()->user()->id ? 'table-active ' : '' }}">
                        <th scope="col">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>
                            <span class="d-inline-block text-truncate" style="max-width=332px;">
                                {{ $user->email }}
                            </span>
                        </td>
                        <td>
                            @if ($user->roles)
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-primary">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($user->permissions)
                                @foreach ($user->permissions as $permission)
                                    <span class="badge bg-dark bg-gradient">
                                        {{ $permission->slug }}
                                    </span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($user->email_verified_at)
                                {{ $user->email_verified_at->format('d-m-Y') }}
                            @endif
                        </td>
                        <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <span class="d-inline-flex">
                                <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                                    </x-slot>
                                </x-table.button>
                                <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                    </x-slot>
                                </x-table.button>
                                <x-table.button type='modal' route="" class='btn-outline-danger'
                                    target="#deleteuser{{ $user->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                    </x-slot>
                                </x-table.button>
                            </span>
                        </td>
                    </tr>
                    <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete"
                        name="{{ $user->name }}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)"
                        btnactionmethod="delete"></x-modal>
                @endforeach
            </x-table>
            {{-- Tabla en Movil --}}
            @foreach ($users as $user)
                <x-table class="table-striped {{ $user->id == auth()->user()->id ? 'table-active ' : '' }}"
                    typetable="movil">
                    <x-slot name="head">
                        <x-table.button type='link' class='btn-outline-success me-1' :route="route('users.show', $user)">
                            <x-slot name="icon">
                                <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                            </x-slot>
                        </x-table.button>
                        <x-table.button type='link' class='btn-outline-warning me-1' :route="route('users.edit', $user)">
                            <x-slot name="icon">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                            </x-slot>
                        </x-table.button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteuser{{ $user->id }}">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </button>
                    </x-slot>
                    <tr>
                        <th scope="col" class="d-flex flex-column">
                            <strong># :</strong>
                            {{ $user->id }}
                        </th>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Name :</strong>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Email :</strong>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Role :</strong>
                            @if ($user->roles)
                                <div class="grid" style="--bs-columns: 3; --bs-gap: 1rem;">
                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Permissions :</strong>
                            @if ($user->permissions)
                                <div class="grid" style="--bs-columns: 3; --bs-gap: 1rem;">
                                    @foreach ($user->permissions as $permission)
                                        <span class="badge bg-dark bg-gradient">
                                            {{ $permission->slug }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Verified :</strong>
                            @if ($user->email_verified_at)
                                {{ $user->email_verified_at->format('d-m-Y') }}
                            @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="d-flex flex-column">
                            <strong>Date :</strong>
                            {{ $user->updated_at->format('d-m-Y') }}
                        </td>
                    </tr>
                </x-table>
                <x-modal id="deleteuser{{ $user->id }}" class="modal-dialog-centered" title="Delete"
                    name="{{ $user->name }}" model="user" btnactioncolor="btn-danger" :btnactionroute="route('users.destroy', $user)"
                    btnactionmethod="delete"></x-modal>
            @endforeach
            <x-slot name="card_footer">
                {{ $users->links() }}
            </x-slot>
        </x-card>
    </main>
@endsection
