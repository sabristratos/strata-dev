@props([
    'variant' => 'body',
    'size' => 'base',
    'weight' => 'normal', 
    'color' => 'foreground',
    'as' => null
])

@php
    $elementTag = $as ?: match ($variant) {
        'quote' => 'blockquote',
        'small', 'caption' => 'small',
        'lead' => 'p',
        default => 'p',
    };
    
    $variantClasses = match ($variant) {
        'quote' => 'border-l-4 border-border pl-6 italic',
        'small', 'caption' => 'text-sm',
        'lead' => 'text-xl text-muted-foreground',
        'muted' => 'text-muted-foreground',
        default => '',
    };
    
    $sizeClasses = (in_array($variant, ['small', 'caption', 'lead']) && $size === 'base') ? '' : match ($size) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        default => '',
    };
    
    $weightClasses = match ($weight) {
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
        default => '',
    };
    
    $colorClasses = ($variant === 'muted' && $color === 'foreground') ? '' : match ($color) {
        'muted' => 'text-muted-foreground',
        'brand' => 'text-brand-600',
        'accent' => 'text-accent',
        'destructive' => 'text-destructive',
        'success' => 'text-success-600',
        'warning' => 'text-warning-600',
        'info' => 'text-info-600',
        default => '',
    };
    
    $allClasses = implode(' ', array_filter([$variantClasses, $sizeClasses, $weightClasses, $colorClasses]));
@endphp

<{{ $elementTag }}
    {{ $attributes->merge([
        'class' => $allClasses
    ]) }}
    data-strata-text="root"
    data-strata-text-variant="{{ $variant }}"
    data-strata-text-size="{{ $size }}"
    data-strata-text-weight="{{ $weight }}"
    data-strata-text-color="{{ $color }}"
>
    <span data-strata-text="content">{!! $slot !!}</span>
</{{ $elementTag }}>