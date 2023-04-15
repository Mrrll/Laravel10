<div>
    <label class="ms-1" for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" {{ $attributes->merge(['class' => "form-control $class "]) }}
        id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">
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
</div>
