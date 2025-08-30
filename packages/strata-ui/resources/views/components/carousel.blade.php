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
    $carouselConfig = $getCarouselConfig();
@endphp

{{-- Main Carousel Container --}}
<div
    x-data="strataCarousel(@js($carouselConfig))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="currentSlide"
    @endif
    data-carousel-id="{{ $carouselId }}"
    data-variant="{{ $variant }}"
    data-navigation-mode="{{ $getNavigationMode() }}"
    {{ $attributes->except(['variant', 'size', 'autoplay', 'interval', 'loop', 'showArrows', 'showDots', 'itemsPerView', 'gap', 'snapAlign', 'hideScrollbar', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    x-show="totalSlides > 0"
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
        @keydown.arrow-left.prevent="previousSlide()"
        @keydown.arrow-right.prevent="nextSlide()"
        @keydown.home.prevent="goToSlide(0)"
        @keydown.end.prevent="goToSlide(totalSlides - 1)"
        @mouseenter="pauseAutoplay"
        @mouseleave="resumeAutoplay"
        @focusin="pauseAutoplay"
        @focusout="resumeAutoplay"
    >
        {{-- Slot Content - each child becomes a slide --}}
        {{ $slot }}
    </div>

    {{-- Combined Navigation Container --}}
    @if($showDots || $showArrows)
        <div class="{{ $getNavigationContainerClasses() }}">
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
                        class="{{ $getDotsContainerClasses() }}"
                        role="tablist"
                        aria-label="Carousel navigation"
                    >
                        {{-- Navigation mode aware dots --}}
                        <template x-show="getCurrentItemsPerView() > 1" x-for="page in Math.min(totalPages, 10)" :key="page">
                            <button
                                type="button"
                                @click="goToPage(page - 1, (page - 1) > currentPage ? 'next' : 'prev')"
                                :class="currentPage === (page - 1) ? '{{ $getDotClasses() }} {{ $getActiveDotClasses() }}' : '{{ $getDotClasses() }}'"
                                :aria-selected="currentPage === (page - 1) ? 'true' : 'false'"
                                :aria-label="`Go to page ${page}`"
                                role="tab"
                                :tabindex="currentPage === (page - 1) ? 0 : -1"
                                data-carousel-control
                            ></button>
                        </template>
                        
                        {{-- Slide mode dots --}}
                        <template x-show="getCurrentItemsPerView() === 1" x-for="slide in Math.min(totalSlides, 10)" :key="slide">
                            <button
                                type="button"
                                @click="goToSlide(slide - 1, { reason: 'user' })"
                                :class="currentSlide === (slide - 1) ? '{{ $getDotClasses() }} {{ $getActiveDotClasses() }}' : '{{ $getDotClasses() }}'"
                                :aria-selected="currentSlide === (slide - 1) ? 'true' : 'false'"
                                :aria-label="`Go to slide ${slide}`"
                                role="tab"
                                :tabindex="currentSlide === (slide - 1) ? 0 : -1"
                                data-carousel-control
                            ></button>
                        </template>
                    </div>
                @endif
            @else
                {{-- Spacer when no dots --}}
                <div></div>
            @endif

            {{-- Navigation Arrows --}}
            @if($showArrows)
                @if(isset($arrows))
                    {{-- Custom Arrows Slot --}}
                    <div class="carousel-custom-arrows">
                        {{ $arrows }}
                    </div>
                @else
                    {{-- Default Arrows --}}
                    <div class="{{ $getArrowContainerClasses() }}">
                        {{-- Previous Arrow --}}
                        <button
                            type="button"
                            x-show="showPrevArrow"
                            @click="previousSlide"
                            :disabled="!canGoPrevious"
                            class="{{ $getArrowClasses() }}"
                            :aria-label="getCurrentItemsPerView() > 1 ? 'Previous page' : 'Previous slide'"
                            data-carousel-control
                        >
                            <x-strata::icon name="heroicon-o-chevron-left" class="w-4 h-4" />
                        </button>

                        {{-- Next Arrow --}}
                        <button
                            type="button"
                            x-show="showNextArrow"
                            @click="nextSlide"
                            :disabled="!canGoNext"
                            class="{{ $getArrowClasses() }}"
                            :aria-label="getCurrentItemsPerView() > 1 ? 'Next page' : 'Next slide'"
                            data-carousel-control
                        >
                            <x-strata::icon name="heroicon-o-chevron-right" class="w-4 h-4" />
                        </button>
                    </div>
                @endif
            @endif
        </div>
    @endif

    {{-- Progress Bar (Optional) --}}
    <div
        x-show="autoplayEnabled && showProgress"
        class="mt-2 w-16 h-1 bg-black/10 dark:bg-white/20 rounded-full overflow-hidden mx-auto"
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
        id="{{ $carouselId }}-status"
    >
        <span x-text="`Slide ${currentSlide + 1} of ${totalSlides}${totalSlides === 0 ? ' (empty carousel)' : ''}`"></span>
    </div>
    
    {{-- Empty State --}}
    <div 
        x-show="totalSlides === 0"
        class="flex items-center justify-center {{ $getSizeClasses() }} text-muted-foreground"
    >
        <div class="text-center">
            <div class="text-4xl mb-2">📷</div>
            <p class="text-sm">No content to display</p>
        </div>
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


/* Native scroll optimizations */
.carousel-scroll-container {
    /* Ensure smooth native scrolling */
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch; /* iOS momentum scrolling */
}

.carousel-scroll-container img {
    pointer-events: none;
    user-select: none;
    -webkit-user-drag: none;
    -khtml-user-drag: none;
    -moz-user-drag: none;
    -o-user-drag: none;
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