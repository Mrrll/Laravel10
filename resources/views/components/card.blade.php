<div class="card {{ $attributes->merge(['class' => $class]) }}" {{ $attributes->style([$style]) }}>
    @if (!empty($card_header))
        <div class="card-header {{ $attributes->merge(['class' => $classheader]) }}">
            {{ $card_header }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
    @if (!empty($card_footer))
        <div class="card-footer {{ $attributes->merge(['class' => $classfooter]) }}">
            {{ $card_footer }}
        </div>
    @endif
</div>
