<div>
    <label class="ms-1" for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" {{ $attributes->merge(['class' => "form-control $class "]) }} id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}">
    @if ($id == 'repeat_password')
        <div id="repeat_password_message" class="d-none invalid">
            <small>*@lang("The passwords do not match").</small>
        </div>
    @else
        @error('name')
            <small class="text-danger invalid-feedback">*{{ $message }}</small>
        @enderror
    @endif
</div>
