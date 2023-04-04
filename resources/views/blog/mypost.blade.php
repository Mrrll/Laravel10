@extends('layouts.dashboard')

@section('title', 'My Posts')

@section('content-dashboard')
    <main class="container center_container flex-column main-dashboard">
        <h1>Mypost</h1>
        {{-- Tabla --}}
        <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm" theadclass="table-dark">
            @foreach ($posts as $post)
                <tr>
                    <th scope="col">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $post->body }}
                        </span>
                    </td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <span class="d-inline-flex">
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $post)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                            <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $post)" method='delete'>
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
        @foreach ($posts as $post)
            <x-table class="table-striped" typetable="movil">
                <x-slot name="head">
                    <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $post)">
                        <x-slot name="icon">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                        </x-slot>
                    </x-table.button>
                    <x-table.button type='submit' class='btn-outline-danger' :route="route('blog.destroy', $post)" method='delete'>
                        <x-slot name="icon">
                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                        </x-slot>
                    </x-table.button>
                </x-slot>
                <tr>
                    <th scope="col" class="d-flex flex-column">
                        <strong># :</strong>
                        {{ $post->id }}
                    </th>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Title :</strong>
                        {{ $post->title }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Slug :</strong>
                        {{ $post->slug }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Body :</strong>
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            {{ $post->body }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Category :</strong>
                        {{ $post->category->name }}
                    </td>
                </tr>
                <tr>
                    <td class="d-flex flex-column">
                        <strong>Date :</strong>
                        {{ $post->updated_at->format('d-m-Y') }}
                    </td>
                </tr>
            </x-table>
        @endforeach
        {{ $posts->links() }}
    </main>
@endsection
