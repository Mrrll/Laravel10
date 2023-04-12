@if ($type == "submit")
    <button type="{{$type}}" {{ $attributes->merge(['class' => "btn btn-$color $class "]) }}>
        {{$slot}}
    </button>
@else
    <a {{ $attributes->merge(['class' => "btn btn-$color $class "]) }} href="{{ $route  }}">
        {{$slot}}
    </a>
@endif
