@extends('layouts.plantilla')

@section('title', 'Blog')

@section('content')
    <main class="container-lg">
        @include('layouts.components.alert')
        <h1>Bienvenido a los blogs</h1>
        <div class="grid justify-content-center align-content-center">
            @if (!empty($posts))
                @foreach ($posts as $post)
                    <div class="g-col-12 g-col-md-6 g-col-lg-4 m-2" style="padding-left: 0px;padding-right: 0px;">
                        <div class="card" style="width: 100%">
                            @if (isset($post->image->url))
                            <img src="{{asset($post->image->url)}}" class="card-img-top" style="height: 190px">
                            @else
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="100"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Capa de imagen"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"></rect><text x="37%"
                                        y="50%" fill="#dee2e6" dy=".3em">Falta imagen</text>
                                </svg>
                            @endif
                            <div class="card-body" style="max-width:400px;">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                <div class="card-text truncate">
                                    {{preg_replace("/<(script|style)[^>]*>[\s\S]*?<\/\1>|<\/?[^>]+>/m",'', $post->body)}}
                                </div>
                                <a href="{{ route('blog.show', $post) }}" class="btn btn-primary mt-3">Leer mas...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <h2>No hay ningún post en estos momentos.</h2>
            @endif
        </div>
    </main>
@endsection
