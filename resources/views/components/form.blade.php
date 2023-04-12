<form action="{{$route}}" method="post" {{ $attributes->merge(['class' => "$class"]) }} {{ $attributes->style([$style]) }}>
    @csrf
    @method($method)
    {{$slot}}
</form>
