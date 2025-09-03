@props([
    'defaultValue' => null,
    'orientation' => 'horizontal',
    'activationMode' => 'automatic',
    'variant' => 'default',
    'disabled' => false
])

@php
    $tabsConfig = $getTabsConfig();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
@endphp

<div
    x-data="strataTabs(@js($tabsConfig))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="activeTab"
    @endif
    data-tabs-container="{{ $tabsId }}"
    data-orientation="{{ $orientation }}"
    data-activation-mode="{{ $activationMode }}"
    data-variant="{{ $variant }}"
    {{ $attributes->except(['defaultValue', 'orientation', 'activationMode', 'variant', 'disabled', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    @if($disabled)
        aria-disabled="true"
    @endif
>
    {{ $slot }}
</div>