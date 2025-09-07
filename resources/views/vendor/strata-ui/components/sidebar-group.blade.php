@props([
    'label' => null,
    'collapsible' => false,
    'collapsed' => false,
])

@php
    $groupId = $getGroupId();
    $contentId = $groupId . '-content';
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
@endphp

<div
    class="{{ $getContainerClasses() }}"
    {{ $attributes->except(['label', 'collapsible', 'collapsed']) }}
    @if($collapsible)
        x-data="{ collapsed: {{ $collapsed ? 'true' : 'false' }} }"
    @endif
>

    @if($hasLabel())
        @if($collapsible)
            <button
                type="button"
                @click="collapsed = !collapsed"
                class="{{ $getLabelClasses() }}"
                {!! $accessibilityAttrs !!}
            >
                <span>{{ $label }}</span>
                <x-strata::icon
                    name="heroicon-o-chevron-down"
                    class="w-3 h-3 transition-transform duration-200"
                    x-bind:class="{ 'rotate-180': !collapsed }"
                />
            </button>
        @else
            <div class="{{ $getLabelClasses() }}">
                {{ $label }}
            </div>
        @endif
    @endif


    <div
        @if($collapsible)
            x-show="!collapsed"
            x-collapse
            id="{{ $contentId }}"
        @endif
        class="{{ $getContentClasses() }}"
    >
        {{ $slot }}
    </div>
</div>
