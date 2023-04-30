<form action="{{$route}}" method="post" {{ $attributes->merge(['class' => "$class"]) }} {{ $attributes->style([$style]) }} enctype="multipart/form-data">
    @csrf
    @method($method)
    {{$slot}}
</form>
