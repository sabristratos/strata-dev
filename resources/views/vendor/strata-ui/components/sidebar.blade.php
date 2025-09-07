@props([
    'name' => null,
    'variant' => 'overlay',
    'width' => 'w-64',
    'position' => 'left',
    'persistent' => false,
    'backdrop' => true,
    'collapsible' => false,
])

@php
    $sidebarId = $getSidebarId();
    $targetId = $name ? "strata-sidebar-{$name}" : $sidebarId;
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
@endphp


<div
    x-data="strataSidebar({
        name: '{{ $name }}',
        variant: '{{ $variant }}',
        persistent: {{ $persistent ? 'true' : 'false' }},
        collapsible: {{ $collapsible ? 'true' : 'false' }}
    })"
>

    @if($shouldShowBackdrop())
        <div
            x-show="show"
            x-transition:enter="transition-opacity duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-cloak
            @click="close()"
            class="{{ $getBackdropClasses() }}"
            aria-hidden="true"
        ></div>
    @endif


    <aside
    x-show="show || variant === 'fixed'"
    x-transition:enter="transform transition-transform duration-300 ease-in-out"
    x-transition:enter-start="{{ $getTransformClasses() }}"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition-transform duration-300 ease-in-out"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="{{ $getTransformClasses() }}"
    :class="{ 
        '{{ $getTransformClasses() }}': !show && variant !== 'fixed',
        'strata-sidebar-reduced-motion': window.matchMedia('(prefers-reduced-motion: reduce)').matches
    }"
    x-cloak
    id="{{ $targetId }}"
    class="{{ $getContainerClasses() }}"
    {{ $attributes->except(['name', 'variant', 'width', 'position', 'persistent', 'backdrop', 'collapsible']) }}
    {!! $accessibilityAttrs !!}
    :aria-hidden="show ? 'false' : 'true'"
    @touchstart.passive="handleTouchStart"
    @touchmove.passive="handleTouchMove"
    @touchend.passive="handleTouchEnd"
>

    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
        role="status"
    >
        <span x-text="show ? `${name || 'Sidebar'} navigation opened` : `${name || 'Sidebar'} navigation closed`"></span>
    </div>

    @if(isset($header))
        <div class="p-4" id="{{ $targetId }}-header">
            {{ $header }}
        </div>
    @elseif($isCollapsible())
        <div class="flex items-center justify-between p-4" id="{{ $targetId }}-header">
            <div class="flex-1">
                <span class="sr-only">Sidebar header</span>
            </div>
            <button
                type="button"
                @click="toggleCollapsed()"
                class="p-1 button-radius text-muted-foreground hover:text-foreground hover:bg-accent transition-colors"
                :aria-label="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
                aria-describedby="{{ $targetId }}-header"
            >
                <x-strata::icon
                    :name="$position === 'right' ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left'"
                    class="w-4 h-4"
                    x-show="!collapsed"
                />
                <x-strata::icon
                    :name="$position === 'right' ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right'"
                    class="w-4 h-4"
                    x-show="collapsed"
                />
            </button>
        </div>
    @endif


    <nav
        class="overflow-y-auto p-4 space-y-1 focus:outline-hidden min-h-0"
        :class="{ 'px-2': collapsed && collapsible }"
        aria-labelledby="{{ isset($header) ? $targetId . '-header' : null }}"
        x-ref="sidebarContent"
        x-trap.inert.noscroll="show && (variant === 'overlay' || (variant === 'hybrid' && _isMobile))"
    >
        {{ $slot }}
    </nav>


    @if(isset($footer))
        <div class="p-4 border-t border-border">
            {{ $footer }}
        </div>
    @endif
</aside>
</div>


@once
<style>
@media (prefers-reduced-motion: reduce) {
    .strata-sidebar-reduced-motion * {
        transition-duration: 0.01ms !important;
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
    }
}
</style>
@endonce
