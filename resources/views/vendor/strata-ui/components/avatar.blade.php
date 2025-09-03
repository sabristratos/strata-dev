@php
    $hasStatusIndicator = $status !== 'none';
    
    $containerClasses = $hasStatusIndicator 
        ? 'relative inline-flex' 
        : 'relative inline-flex overflow-hidden';
    
    $innerClasses = implode(' ', array_filter([
        'relative inline-flex items-center justify-center bg-muted text-muted-foreground font-medium select-none',
        $hasStatusIndicator ? 'overflow-hidden' : '',
        $getSizeClasses(),
        $getShapeClasses(),
        $getBorderClasses(),
    ]));
@endphp

@if($tooltip)
<x-strata::tooltip :text="$tooltip" :position="$tooltipPosition">
@endif

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    <div class="{{ $innerClasses }}">
        @if ($src)
            <div x-data="{ imageError: false }">
                <img 
                    x-show="!imageError"
                    src="{{ $src }}" 
                    alt="{{ $alt ?? '' }}"
                    class="w-full h-full object-cover {{ $getShapeClasses() }}"
                    x-on:error="imageError = true"
                />
                <div x-show="imageError" x-cloak class="flex items-center justify-center w-full h-full">
                    <x-icon name="heroicon-o-user" class="w-1/2 h-1/2 text-current" />
                </div>
            </div>
        @elseif ($initials)
            <span class="{{ $getInitialsTextClasses() }} font-semibold">
                {{ $initials }}
            </span>
        @else
            <x-icon name="heroicon-o-user" class="w-1/2 h-1/2 text-current" />
        @endif
    </div>

    @if ($status !== 'none')
        <div class="{{ $getStatusClasses() }}"></div>
    @endif

    {{ $slot }}
</div>

@if($tooltip)
</x-strata::tooltip>
@endif