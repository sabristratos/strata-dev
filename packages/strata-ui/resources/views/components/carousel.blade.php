@props([])

@php
    $carouselId = $getCarouselId();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    $carouselConfig = $getCarouselConfig();
    $shouldShowDots = $shouldShowDots();
@endphp


<div
    x-data="strataCarousel(@js($carouselConfig))"
    x-init="init()"
    @if($isWireModel)
        x-modelable="currentSlide"
    @endif
    data-carousel-id="{{ $carouselId }}"
    data-variant="{{ $variant }}"
    {{ $attributes->except(['wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ]) }}
    x-show="totalSlides > 0"
>

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
        aria-label="Carousel content"
        aria-roledescription="carousel"
        :aria-describedby="`${$id('carousel-instructions')}`"
        aria-live="polite"
        tabindex="0"
        @keydown.arrow-left.prevent="previousSlide"
        @keydown.arrow-right.prevent="nextSlide"
        @keydown.home.prevent="goToSlide(0)"
        @keydown.end.prevent="goToSlide(totalSlides - 1)"
        @keydown.escape.prevent="$el.blur()"
        @mouseenter="pauseAutoplay"
        @mouseleave="resumeAutoplay"
        @focusin="pauseAutoplay"
        @focusout="resumeAutoplay"
    >

        {{ $slot }}
    </div>


    @if($shouldShowDots || $showArrows)
        <div class="flex items-center justify-between mt-4">

            @if($shouldShowDots)
                @if(isset($dots))

                    <div class="carousel-custom-dots">
                        {{ $dots }}
                    </div>
                @else

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

                <div></div>
            @endif


            @if($showArrows)
                @if(isset($arrows))

                    <div class="carousel-custom-arrows">
                        {{ $arrows }}
                    </div>
                @else

                    <div class="flex items-center gap-2">

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



    {{-- Screen Reader Instructions --}}
    <div class="sr-only" :id="$id('carousel-instructions')">
        Use arrow keys to navigate between slides, Home to go to first slide, End to go to last slide, Escape to exit carousel focus.
    </div>

    {{-- Screen Reader Status --}}
    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
        id="{{ $carouselId }}-status"
    >
        <span x-text="`Slide ${currentSlide + 1} of ${totalSlides}${autoplayEnabled ? ' (auto-advancing)' : ''}${totalSlides === 0 ? ' (empty carousel)' : ''}`"></span>
    </div>
    

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

/* Container query based widths - with fallbacks for older browsers */
[data-carousel-id] .strata-carousel-item,
[data-carousel-id] [x-ref="scrollContainer"] > * {
    width: var(--carousel-item-width, 100%); /* Fallback for browsers without container query support */
    width: var(--carousel-item-width, 100cqw); /* Container query units for modern browsers */
}

/* Responsive container query widths - using Tailwind design tokens */
@container (min-width: theme(screens.sm)) {
    [data-carousel-id] .strata-carousel-item,
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-sm, var(--carousel-item-width, 100cqw));
    }
}

@container (min-width: theme(screens.md)) {
    [data-carousel-id] .strata-carousel-item,
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-md, var(--carousel-item-width, 100cqw));
    }
}

@container (min-width: theme(screens.lg)) {
    [data-carousel-id] .strata-carousel-item,
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-lg, var(--carousel-item-width, 100cqw));
    }
}

@container (min-width: theme(screens.xl)) {
    [data-carousel-id] .strata-carousel-item,
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-xl, var(--carousel-item-width, 100cqw));
    }
}

/* Fallback media queries for browsers without container query support */
@supports not (container-type: inline-size) {
    @media (min-width: theme(screens.sm)) {
        [data-carousel-id] .strata-carousel-item,
        [data-carousel-id] [x-ref="scrollContainer"] > * {
            width: var(--carousel-item-width-sm, var(--carousel-item-width, 100%));
        }
    }

    @media (min-width: theme(screens.md)) {
        [data-carousel-id] .strata-carousel-item,
        [data-carousel-id] [x-ref="scrollContainer"] > * {
            width: var(--carousel-item-width-md, var(--carousel-item-width, 100%));
        }
    }

    @media (min-width: theme(screens.lg)) {
        [data-carousel-id] .strata-carousel-item,
        [data-carousel-id] [x-ref="scrollContainer"] > * {
            width: var(--carousel-item-width-lg, var(--carousel-item-width, 100%));
        }
    }

    @media (min-width: theme(screens.xl)) {
        [data-carousel-id] .strata-carousel-item,
        [data-carousel-id] [x-ref="scrollContainer"] > * {
            width: var(--carousel-item-width-xl, var(--carousel-item-width, 100%));
        }
    }
}

/* Carousel variants */
.carousel-gallery {
    background: transparent;
}

.carousel-cards [x-ref="scrollContainer"] > * {
    @apply bg-white rounded-lg shadow-md;
}

/* Accessibility and performance */
[x-ref="scrollContainer"] {
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
}

[x-ref="scrollContainer"] img {
    pointer-events: none;
    user-select: none;
    -webkit-user-drag: none;
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    [x-ref="scrollContainer"] {
        scroll-behavior: auto;
    }
}
</style>
@endonce