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
    $shouldShowDots = $shouldShowDots();
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
    {{ $attributes->except(['variant', 'size', 'autoplay', 'interval', 'loop', 'showArrows', 'showDots', 'itemsPerView', 'gap', 'snapAlign', 'hideScrollbar', 'wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    x-show="totalSlides > 0"
>
    {{-- Scroll Container with Container Query Support --}}
    <div
        x-ref="scrollContainer"
        @if($hideScrollbar)
            style="scrollbar-width: none; -ms-overflow-style: none; {{ $getItemStyles() }}"
        @else
            style="{{ $getItemStyles() }}"
        @endif
        @class([
            $getScrollContainerClasses(),
            'h-full',
            '[container-type:inline-size]',
            $hideScrollbar ? '[&::-webkit-scrollbar]:hidden' : ''
        ])
        @scroll="handleScroll"
        role="region"
        aria-label="Carousel"
        aria-live="polite"
        tabindex="0"
        @keydown.arrow-left.prevent="previousSlide"
        @keydown.arrow-right.prevent="nextSlide"
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

    {{-- Navigation Container --}}
    @if($shouldShowDots || $showArrows)
        <div class="flex items-center justify-between mt-4">
            {{-- Navigation Dots --}}
            @if($shouldShowDots)
                @if(isset($dots))
                    {{-- Custom Dots Slot --}}
                    <div class="carousel-custom-dots">
                        {{ $dots }}
                    </div>
                @else
                    {{-- Default Dots - Only for single-item carousels --}}
                    <div class="flex gap-1.5" role="tablist" aria-label="Carousel navigation">
                        <template x-for="slide in Math.min(totalSlides, 10)" :key="slide">
                            <button
                                type="button"
                                @click="goToSlide(slide - 1)"
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
                    <div class="flex items-center gap-2">
                        {{-- Previous Arrow --}}
                        <button
                            type="button"
                            x-show="showPrevArrow"
                            @click="previousSlide"
                            :disabled="!canGoPrevious"
                            class="{{ $getArrowClasses() }}"
                            aria-label="Previous slide"
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
                            aria-label="Next slide"
                            data-carousel-control
                        >
                            <x-strata::icon name="heroicon-o-chevron-right" class="w-4 h-4" />
                        </button>
                    </div>
                @endif
            @endif
        </div>
    @endif


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

{{-- Essential carousel styles with container queries --}}
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

/* Container query support */
.\[container-type\:inline-size\] {
    container-type: inline-size;
}

/* Container query based widths - target the scroll container's direct children */
[data-carousel-id] [x-ref="scrollContainer"] > * {
    width: var(--carousel-item-width, 100cqw) !important;
}

/* Responsive container query widths */
@container (min-width: 640px) {
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-sm, var(--carousel-item-width, 100cqw)) !important;
    }
}

@container (min-width: 768px) {
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-md, var(--carousel-item-width, 100cqw)) !important;
    }
}

@container (min-width: 1024px) {
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-lg, var(--carousel-item-width, 100cqw)) !important;
    }
}

@container (min-width: 1280px) {
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-xl, var(--carousel-item-width, 100cqw)) !important;
    }
}

/* Carousel variants */
.carousel-gallery {
    background: transparent;
}

.carousel-cards .carousel-scroll-container > * {
    @apply bg-white rounded-lg shadow-md;
}

/* Accessibility and performance */
.carousel-scroll-container {
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
}

.carousel-scroll-container img {
    pointer-events: none;
    user-select: none;
    -webkit-user-drag: none;
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    .carousel-scroll-container {
        scroll-behavior: auto;
    }
}
</style>
@endonce