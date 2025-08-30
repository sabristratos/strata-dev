@props([
    'href' => null,
    'icon' => null,
    'active' => false
])

@php
    $tag = $href ? 'a' : 'button';
    $baseClasses = 'flex items-center w-full gap-3 px-3 py-2 text-sm text-left button-radius transition-colors';
    $activeClasses = $active
        ? 'bg-accent text-accent-foreground font-medium'
        : 'text-foreground hover:bg-accent hover:text-accent-foreground';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => "$baseClasses $activeClasses", 'href' => $href]) }}>
    @if ($icon)
        <x-icon :name="$icon" class="w-4 h-4" />
    @endif

    <span class="flex-1">{{ $slot }}</span>

    @if (isset($badge))
        {{ $badge }}
    @endif
</{{ $tag }}>
