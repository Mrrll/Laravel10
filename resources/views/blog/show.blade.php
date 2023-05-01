@extends('layouts.plantilla')

@section('title', 'Post | ' . $post->title)
@section('content')
    <main class="container-lg">
        @include('layouts.components.alert')
        <div class="card mt-4">
            <div class="card-header text-center">
                Bienvenido al post {{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->category->name }}</h5>
                <p class="card-text">{!! $post->body !!} </p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between">
                <a class="btn btn-primary" href="{{ url()->previous() }}">Volver</a>
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseComments"
                    aria-expanded="false" aria-controls="collapseComments">
                    Read comments
                </button>
            </div>
        </div>
        <div class="collapse mb-4" id="collapseComments">
            <div class="card card-body" style="padding: 1em 0;">
                <x-form :route="route('comments.store')" style="width:100%">
                    <div class="grid justify-content-center align-items-center">
                        @if (!empty(auth()->user()->image->url))
                            <img src="{{ asset(auth()->user()->image->url) }}" width="48px" height="48px"
                                class="g-col-1 ms-3 mt-4">
                        @else
                            <i class="fa-solid fa-circle-user fa-2xl g-col-1 ms-3 mt-4" style="color: #8a0000;"></i>
                        @endif
                        <div class="form-group g-col-10">
                            <label for="message" class="form-label ms-1">Your message :</label>
                            <input class="form-control form-control-lg" id="message" type="text" name="message">
                        </div>
                        <button type="submit" class="btn g-col-1 me-3 mt-4" width="48px" height="48px">
                            <i class="fa-solid fa-check fa-2xl" style="color: #17b019;"></i>
                        </button>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                </x-form>
            </div>
            @if (isset($post->comments))
                @foreach ($post->comments->reverse() as $comment)
                    <div class="card card-body">
                        <div class="grid justify-content-center align-items-center">
                            @if (!empty($comment->user->image->url))
                                <img src="{{ asset($comment->user->image->url) }}" width="48px" height="48px"
                                    class="g-col-1">
                            @else
                                <i class="fa-solid fa-circle-user fa-2xl g-col-1" style="color: #8a0000;"></i>
                            @endif
                            <div class="form-group g-col-10">
                                <p>{{ $comment->message }}</p>
                            </div>
                            @can('delete', $comment)
                                <x-table.button type='modal' route="" class='btn-outline-danger'
                                    target="#deletecomment{{ $comment->id }}">
                                    <x-slot name="icon">
                                        <i class="fa-solid fa-trash" style="color: #f66661;"></i>
                                    </x-slot>
                                </x-table.button>
                            @endcan
                        </div>
                    </div>
                    {{-- Modal Borrar --}}
                    <x-modal id="deletecomment{{ $comment->id }}" class="modal-dialog-centered" title="Delete"
                    name="Este" model="comment" btnactioncolor="btn-danger" :btnactionroute="route('comments.destroy', $comment)"
                    btnactionmethod="delete"></x-modal>
                @endforeach
            @endif
        </div>
    </main>
@endsection
