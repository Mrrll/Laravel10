@if ($type == 'link')
    <a href="{{ $route ?? '#' }}" {{ $attributes->merge(['class' => "btn $class"]) }}>
        {{ $icon }}
    </a>
@elseif ($type == 'submit')
    <form action="{{ $route ?? '' }}" method="post">
        @csrf
        @method("$method")
        <button type="submit" {{ $attributes->merge(['class' => "btn $class"]) }}>
            {{ $icon }}
        </button>
    </form>
@elseif ($type == 'modal')
        <button type="button" {{ $attributes->merge(['class' => "btn $class"]) }} data-bs-toggle="modal" {{ $attributes->merge(['data-bs-target' => "$target"]) }}>
            {{ $icon }}
        </button>
    </form>
@endif
