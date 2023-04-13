@extends('layouts.dashboard')

@section('title', 'List Users')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>List Users</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle" theadclass="table-dark">
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
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>

                        {{ $user->email_verified_at->format('d-m-Y') }}
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
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteuser{{$user->id}}">
                                <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                            </button>
                        </span>
                    </td>
                </tr>
                <x-modal id="deleteuser{{$user->id}}" class="modal-dialog-centered">
                    <x-slot name="title">
                        @lang('Delete')
                    </x-slot>
                    <strong> @lang("You're sure ?")</strong> @lang('you want to delete the user <strong>:user</strong>, if you click continue, the user will be deleted and cannot be recovered.', ['user' => $user->name])
                    <x-slot name="footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Do not continue')</button>
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger">@lang('Continue')</button>
                        </form>
                    </x-slot>
                </x-modal>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($users as $user)
            <x-table class="table-striped {{ $user->id == auth()->user()->id ? 'table-active ' : '' }}" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $user)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $user)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
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
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Verified :</strong>
                        {{ $user->email_verified_at->format('d-m-Y') }}
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
        @endforeach
        {{ $users->links() }}

    </main>
@endsection
