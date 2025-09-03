@props([
    'href' => null,
    'icon' => null,
    'active' => false,
    'nested' => false,
    'hideIcon' => false,
])

@php
    $tag = $href ? 'a' : 'button';
    $baseClasses = $getBaseClasses();
    $stateClasses = $getStateClasses();
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => "$baseClasses $stateClasses", 'href' => $href]) }}>
    @if ($shouldShowIcon())
        <x-icon :name="$icon" class="{{ $getIconClasses() }}" />
    @endif

    <span class="flex-1 truncate">{{ $slot }}</span>

    @if (isset($badge))
        <div class="flex-shrink-0 mr-2">
            {{ $badge }}
        </div>
    @endif
</{{ $tag }}>
