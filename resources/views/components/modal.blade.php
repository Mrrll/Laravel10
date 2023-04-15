<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div {{ $attributes->merge(['class' => "modal-dialog $class"]) }}>
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    {{ $title }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModalErrors()"></button>
            </div>
            @if ($title == 'Create' || $title == 'Edit')
                <form action="{{ $routeform ?? '' }}" method="post" {{ $attributes->merge(['class' => "$classform"]) }}
                    {{ $attributes->style([$styleform]) }}>
                    @csrf
                    @method($methodform)
            @endif
            <div class="modal-body">
                @switch($title)
                    @case('Delete')
                        <strong> @lang("You're sure ?")</strong> @lang('you want to delete the :model <strong>:name</strong>, if you click continue, the :model will be deleted and cannot be recovered.', ['name' => $name, 'model' => $model])
                    @break

                    @default
                        {{ $slot }}
                @endswitch
            </div>
            <div class="modal-footer">
                @switch($title)
                    @case('Delete')
                    @case('Create')
                    @case('Edit')
                        <button type="button" {{ $attributes->merge(['class' => "btn $btndismisscolor"]) }}
                            data-bs-dismiss="modal" onclick="closeModalErrors()" >@lang("$btndismiss")</button>
                        @if ($title == 'Create' || $title == 'Edit')
                            <button type="submit"
                                {{ $attributes->merge(['class' => "btn $btnactioncolor"]) }}>@lang("$btnaction")</button>
                        @else
                            <form action="{{ $btnactionroute }}" method="post">
                                @csrf
                                @method($btnactionmethod)
                                <button
                                    type="submit"{{ $attributes->merge(['class' => "btn $btnactioncolor"]) }}>@lang("$btnaction")</button>
                            </form>
                        @endif
                    @break

                    @default
                        {{ $footer }}
                @endswitch
            </div>
            @if ($title == 'Create' || $title == 'Edit')
                </form>
            @endif
        </div>
    </div>
</div>
<script type="module">
    function closeModalErrors() {
        $('.text-danger').remove();
    }
    window.closeModalErrors = closeModalErrors;
</script>
