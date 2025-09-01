@props([
    'target' => null,
    'variant' => 'button',
    'size' => 'md',
    'icon' => null,
])

@php
    $targetId = $getTargetId();
    $accessibilityAttrs = collect($getAccessibilityAttributes())->map(fn($value, $key) => "{$key}=\"{$value}\"")->implode(' ');
@endphp

<button
    type="button"
    @click="$strata.sidebar('{{ $target ?: 'main' }}').toggle()"
    class="{{ $getVariantClasses() }}"
    {{ $attributes->except(['target', 'variant', 'size', 'icon']) }}
    {!! $accessibilityAttrs !!}
>
    @if($isHamburger())
        {{-- Animated Hamburger Icon --}}
        <div class="hamburger-icon">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </div>
    @else
        {{-- Regular Icon --}}
        <x-strata::icon 
            :name="$icon" 
            class="{{ $getIconSizeClasses() }}"
        />
        
        @if($variant === 'button' && $slot->isNotEmpty())
            <span class="ml-2">
                {{ $slot }}
            </span>
        @endif
    @endif
</button>

@if($isHamburger())
    {{-- Hamburger Animation Styles --}}
    <style>
        .hamburger-toggle {
            --hamburger-line-height: 2px;
            --hamburger-line-spacing: 4px;
        }

        .hamburger-icon {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 18px;
            height: 14px;
        }

        .hamburger-line {
            display: block;
            width: 100%;
            height: var(--hamburger-line-height);
            background-color: currentColor;
            transition: all 0.2s ease-in-out;
            transform-origin: center;
        }

        .hamburger-line:not(:last-child) {
            margin-bottom: var(--hamburger-line-spacing);
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:first-child {
            transform: translateY(calc(var(--hamburger-line-height) + var(--hamburger-line-spacing))) rotate(45deg);
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-toggle[aria-expanded="true"] .hamburger-line:last-child {
            transform: translateY(calc(-1 * (var(--hamburger-line-height) + var(--hamburger-line-spacing)))) rotate(-45deg);
        }
    </style>
@endif