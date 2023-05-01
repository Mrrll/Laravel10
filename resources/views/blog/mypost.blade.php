@extends('layouts.dashboard')

@section('title', 'My Posts')

@section('content-dashboard')
    <main class="container flex-column main-dashboard">
        @include('layouts.components.alert')
        <x-card class="mt-2" classheader="d-flex justify-content-between"
            classfooter="d-flex justify-content-end align-items-center class-footer-card">
            <x-slot name="card_header">
                <h2>List of Posts</h2>
                <div class="align-self-center">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary"> Create Post</a>
                </div>
            </x-slot>
            {{-- Tabla --}}
            <x-table :thead="$headName" class="table-striped table-hover table-responsive-sm align-middle" theadclass="table-dark">
                @foreach ($posts as $post)
                    <tr class="text-center">
                        <th  scope="col">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <span class="d-inline-block text-truncate" style="max-width: 250px;">
                                {{preg_replace("/<(script|style)[^>]*>[\s\S]*?<\/\1>|<\/?[^>]+>/m",'', $post->body)}}
                            </span>
                        </td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ (!empty($post->published)) ? $post->published->format('d-m-Y') : ''}}</td>
                        <td>{{ $post->updated_at->format('d-m-Y') }}</td>
                        <td class="text-end">
                            <span class="d-inline-flex">
                                <x-table.button type='link' class='btn-outline-success ms-1' :route="route('blog.show', $post)">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                                    </x-slot>
                                </x-table.button>
                                @can('edit', $post)
                                    <x-table.button type='link' class='btn-outline-warning ms-1' :route="route('blog.edit', $post)">
                                        <x-slot name="icon">
                                            <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                        </x-slot>
                                    </x-table.button>
                                @endcan
                                @can('delete', $post)
                                    <x-table.button type='submit' class='btn-outline-danger ms-1' :route="route('blog.destroy', $post)" method='delete'>
                                        <x-slot name="icon">
                                            <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                        </x-slot>
                                    </x-table.button>
                                @endcan
                            </span>
                        </td>
                    </tr>
                @endforeach
            </x-table>
            {{-- Tabla en Movil --}}
            @foreach ($posts as $post)
                <x-table class="table-striped" typetable="movil">
                    <x-slot name="head">
                        <x-table.button type='link' class='btn-outline-success me-1' :route="route('blog.show', $post)">
                            <x-slot name="icon">
                                <i class="fa-solid fa-eye" style="color: #7cf884;"></i>
                            </x-slot>
                        </x-table.button>
                        @can('edit', $post)
                            <x-table.button type='link' class='btn-outline-warning me-1' :route="route('blog.edit', $post)">
                                <x-slot name="icon">
                                    <i class="fa-solid fa-pen-to-square" style="color: #ffee33;"></i>
                                </x-slot>
                            </x-table.button>
                        @endcan
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
                                {{preg_replace("/<(script|style)[^>]*>[\s\S]*?<\/\1>|<\/?[^>]+>/m",'', $post->body)}}
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
            <x-slot name="card_footer">
                {{ $posts->links() }}
            </x-slot>
        </x-card>
    </main>
@endsection
