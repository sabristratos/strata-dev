@props([
    'variant' => 'default',
    'size' => 'md',
    'type' => 'single',
    'defaultValue' => null,
    'animated' => true,
    'iconPosition' => 'end',
    'disabled' => false,
])

@php
    $accordionConfig = $getAccordionConfig();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
@endphp

<div
    x-data="strataAccordion(@js($accordionConfig))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="openItems"
    @endif
    data-accordion-id="{{ $accordionId }}"
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    data-type="{{ $type }}"
    data-icon-position="{{ $iconPosition }}"
    data-animated="{{ $animated ? 'true' : 'false' }}"
    {{ $attributes->except(['variant', 'size', 'type', 'defaultValue', 'animated', 'iconPosition', 'disabled', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    role="region"
    aria-label="Accordion"
    @if($disabled)
        aria-disabled="true"
    @endif
>
    {{ $slot->isEmpty() ? '' : $slot }}
    
    @once
    @push('styles')
        <style>
            /* x-cloak support for Alpine.js */
            [x-cloak] { display: none !important; }
        </style>
    @endpush
    @endonce
</div>