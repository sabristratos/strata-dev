@props([
    'variant' => 'default',
    'size' => 'md',
    'autoplay' => false,
    'interval' => 3000,
    'loop' => true,
    'showArrows' => true,
    'showDots' => true,
    'itemsPerView' => 1,
    'gap' => 'md',
    'snapAlign' => 'center',
    'hideScrollbar' => true,
])

@php
    $carouselId = $getCarouselId();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
@endphp

{{-- Main Carousel Container --}}
<div
    x-data="strataCarousel(@js([
        'id' => $carouselId,
        'autoplay' => $autoplay,
        'interval' => $interval,
        'loop' => $loop,
        'itemsPerView' => $itemsPerView,
        'variant' => $variant,
        'size' => $size,
        'itemClasses' => $getItemClasses()
    ]))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="currentSlide"
    @endif
    data-carousel-id="{{ $carouselId }}"
    data-variant="{{ $variant }}"
    {{ $attributes->except(['variant', 'size', 'autoplay', 'interval', 'loop', 'showArrows', 'showDots', 'itemsPerView', 'gap', 'snapAlign', 'hideScrollbar', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
>
    {{-- Scroll Container --}}
    <div
        x-ref="scrollContainer"
        @if($hideScrollbar)
            style="scrollbar-width: none; -ms-overflow-style: none;"
        @endif
        @class([
            $getScrollContainerClasses(),
            'h-full',
            $hideScrollbar ? '[&::-webkit-scrollbar]:hidden' : ''
        ])
        @scroll="handleScroll"
        @touchstart="handleTouchStart"
        @touchmove="handleTouchMove"
        @touchend="handleTouchEnd"
        role="region"
        aria-label="Carousel"
        aria-live="polite"
        tabindex="0"
        @keydown.arrow-left="previousSlide"
        @keydown.arrow-right="nextSlide"
        @keydown.home="goToSlide(0)"
        @keydown.end="goToSlide(totalSlides - 1)"
        @mouseenter="pauseAutoplay"
        @mouseleave="resumeAutoplay"
        @focusin="pauseAutoplay"
        @focusout="resumeAutoplay"
    >
        {{-- Slot Content - each child becomes a slide --}}
        {{ $slot }}
    </div>

    {{-- Navigation Arrows --}}
    @if($showArrows)
        @if(isset($arrows))
            {{-- Custom Arrows Slot --}}
            <div class="carousel-custom-arrows">
                {{ $arrows }}
            </div>
        @else
            {{-- Default Arrows --}}
            <div class="carousel-arrows">
                {{-- Previous Arrow --}}
                <button
                    type="button"
                    x-show="showPrevArrow"
                    @click="previousSlide"
                    :disabled="!canGoPrevious"
                    :class="'{{ $getArrowClasses() }} left-4'"
                    aria-label="Previous slide"
                >
                    <x-strata::icon name="heroicon-o-chevron-left" class="w-5 h-5" />
                </button>

                {{-- Next Arrow --}}
                <button
                    type="button"
                    x-show="showNextArrow"
                    @click="nextSlide"
                    :disabled="!canGoNext"
                    :class="'{{ $getArrowClasses() }} right-4'"
                    aria-label="Next slide"
                >
                    <x-strata::icon name="heroicon-o-chevron-right" class="w-5 h-5" />
                </button>
            </div>
        @endif
    @endif

    {{-- Navigation Dots --}}
    @if($showDots)
        @if(isset($dots))
            {{-- Custom Dots Slot --}}
            <div class="carousel-custom-dots">
                {{ $dots }}
            </div>
        @else
            {{-- Default Dots --}}
            <div
                :class="'{{ $getDotsContainerClasses() }}'"
                role="tablist"
                aria-label="Carousel navigation"
            >
                <template x-for="index in Math.min(totalSlides, 10)" :key="index">
                    <button
                        type="button"
                        @click="goToSlide(index - 1)"
                        :class="currentSlide === (index - 1) ? '{{ $getDotClasses() }} {{ $getActiveDotClasses() }}' : '{{ $getDotClasses() }}'"
                        :aria-selected="currentSlide === (index - 1) ? 'true' : 'false'"
                        :aria-label="`Go to slide ${index}`"
                        role="tab"
                        :tabindex="currentSlide === (index - 1) ? 0 : -1"
                    ></button>
                </template>
            </div>
        @endif
    @endif

    {{-- Progress Bar (Optional) --}}
    <div
        x-show="autoplayEnabled && showProgress"
        class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-16 h-1 bg-black/10 dark:bg-white/20 rounded-full overflow-hidden"
    >
        <div
            class="h-full bg-primary transition-all duration-100 ease-linear rounded-full"
            :style="`width: ${autoplayProgress}%`"
        ></div>
    </div>

    {{-- Screen Reader Status --}}
    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
    >
        <span x-text="`Slide ${currentSlide + 1} of ${totalSlides}`"></span>
    </div>
</div>

{{-- Styles for Modern CSS Features --}}
@once
<style>
/* Hide scrollbars while maintaining accessibility */
.scrollbar-hide {
    scrollbar-width: none;
    -ms-overflow-style: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Progressive enhancement for modern browsers */
@supports (scroll-snap-type: x mandatory) {
    .carousel-scroll-container {
        scroll-snap-type: x mandatory;
    }
    
    .carousel-scroll-container > * {
        scroll-snap-align: var(--carousel-snap-align, center);
    }
}

/* Modern CSS scroll buttons (Chrome 135+) */
@supports (::scroll-button(left)) {
    .carousel-scroll-container::scroll-button(left) {
        content: "⬅" / "Previous slide";
    }
    
    .carousel-scroll-container::scroll-button(right) {
        content: "➡" / "Next slide"; 
    }
}

/* CSS Scroll Markers (Chrome 135+) */
@supports (scroll-marker-group: after) {
    .carousel-with-markers {
        scroll-marker-group: after;
    }
    
    .carousel-with-markers > *::scroll-marker {
        content: ' ';
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
    }
}

/* Carousel variants */
.carousel-gallery {
    background: transparent;
}

.carousel-cards .carousel-scroll-container > * {
    @apply bg-white rounded-lg shadow-md;
}

/* Touch device optimizations */
@media (hover: none) {
    .carousel-arrows button {
        @apply opacity-100;
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    .carousel-scroll-container {
        scroll-behavior: auto;
    }
    
    .carousel-scroll-container * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>
@endonce