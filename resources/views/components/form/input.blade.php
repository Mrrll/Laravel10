@switch($type)
    @case('textarea')
        <label class="ms-1" for="{{ $id }}">{{ $label }}</label>
        <textarea name="{{ $name }}" id="{{ $id }}" cols="{{ $textareacols }}" rows="{{ $textarearow }}"
            {{ $attributes->merge(['class' => "form-control $class "]) }}>{{ $value }}</textarea>
        @error($name)
            <small class="text-danger">*{{ $message }}</small>
        @enderror
    @break

    @default
        @if ($type != 'hidden')
            <label class="ms-1" for="{{ $id }}">{{ $label }}</label>
        @endif
        <input type="{{ $type }}" {{ $attributes->merge(['class' => "form-control $class "]) }}
            id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
            value="{{ $value }}" {{ $readyonly ? $attributes->merge(['readonly' => true]) : '' }}
            {{ $disable ? $attributes->merge(['disabled' => true]) : '' }}>
        @if ($id == 'repeat_password')
            <div id="repeat_password_message" class="d-none invalid">
                <small>*@lang('The passwords do not match').</small>
            </div>
        @else
            @if ($errors->create->first($name))
                <small class="text-danger">*{{ $errors->create->first($name) }}</small>
            @elseif ($errors->edit->first($name))
                <small class="text-danger">*{{ $errors->edit->first($name) }}</small>
            @else
                @error($name)
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
            @endif
        @endif

@endswitch
