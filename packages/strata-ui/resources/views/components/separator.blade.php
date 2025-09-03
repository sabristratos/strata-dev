@props([
    'orientation' => 'horizontal',
    'variant' => 'default',
    'spacing' => 'md',
    'label' => null,
])

@php
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
@endphp

@if($hasLabel())

    <div 
        {{ $attributes->merge(['class' => $getContainerClasses()]) }}
        {!! $accessibilityAttrs !!}
    >
        @if($orientation === 'horizontal')
            <div class="{{ $getSeparatorClasses() }}"></div>
            <span class="{{ $getLabelClasses() }} {{ $getBackgroundClasses() }}">{{ $label }}</span>
            <div class="{{ $getSeparatorClasses() }}"></div>
        @else
            <div class="{{ $getSeparatorClasses() }}"></div>
            <span class="{{ $getLabelClasses() }} {{ $getBackgroundClasses() }}">{{ $label }}</span>
            <div class="{{ $getSeparatorClasses() }}"></div>
        @endif
    </div>
@else

    <div 
        {{ $attributes->merge(['class' => $getContainerClasses()]) }}
        {!! $accessibilityAttrs !!}
    >
        <div class="{{ $getSeparatorClasses() }}"></div>
    </div>
@endif