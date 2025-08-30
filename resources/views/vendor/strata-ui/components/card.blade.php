@php
    $baseClasses = 'bg-card text-card-foreground transition-colors duration-200';
    $classes = implode(' ', [$baseClasses, $getSizeClasses(), $getBorderClasses()]);
@endphp

<div {{ $attributes->merge(['class' => $classes . ' card-radius']) }}>
    {{ $slot }}
</div>