@extends('layouts.dashboard')

@section('title', 'My Cursos')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>MyCursos</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm" theadclass="table-dark">
            @foreach ($cursos as $curso)
                <tr>
                    <th scope="col">{{ $curso->id }}</th>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                            {{ $curso->name }}
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                            {{ $curso->slug }}
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $curso->description }}
                        </span>
                    </td>
                    <td>{{ $curso->categoria }}</td>
                    <td>{{ $curso->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('cursos.edit', $curso)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='submit' class='btn-outline-danger' :route="route('cursos.destroy', $curso)" method='delete'>
                                <x-slot name="icon">
                                    <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                </x-slot>
                            </x-table.button>
                        </span>
                    </td>
                </tr>
            @endforeach
        </x-table>
        {{-- Tabla en Movil --}}
        @foreach ($cursos as $curso)
            <x-table class="table-striped" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('cursos.edit', $curso)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('cursos.destroy', $curso)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $curso->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Nombre :</strong>
                        {{ $curso->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Slug :</strong>
                        {{ $curso->slug }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Description :</strong>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $curso->description }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Category :</strong>
                        {{ $curso->categoria }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $curso->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
        @endforeach
        {{ $cursos->links() }}
    </main>
@endsection
