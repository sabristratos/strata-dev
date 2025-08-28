@php
    $hasLabel = isset($label) && !empty($label);
@endphp

@if($hasLabel)
    <div class="px-3 py-2 border-t border-muted/30">
        <h6 class="text-xs font-semibold text-muted uppercase tracking-wide">{{ $label }}</h6>
    </div>
@else
    <div class="border-t border-muted/30 my-1" {{ $attributes }}></div>
@endif
