<div {{ $attributes->merge(['class' => "card $class"]) }} {{ $attributes->style([$style]) }}>
    @if (!empty($card_header))
        <div {{ $attributes->merge(['class' =>  "card-header $classheader"]) }}>
            {{ $card_header }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
    @if (!empty($card_footer))
        <div {{ $attributes->merge(['class' => "card-footer $classfooter"]) }}>
            {{ $card_footer }}
        </div>
    @endif
</div>
