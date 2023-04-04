@if ($type == 'link')
    <a href="{{ $route ?? '#' }}" {{ $attributes->merge(['class' => "btn $class"]) }}>
        {{ $icon }}
    </a>
@elseif ($type == 'submit')
    <form action="{{ $route ?? '' }}" method="post">
        @csrf
        @method('{{$method}}')
        <button type="submit" {{ $attributes->merge(['class' => "btn $class"]) }}>
            {{ $icon }}
        </button>
    </form>
@endif
