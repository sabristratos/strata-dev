<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $carouselId = $getCarouselId();
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    $carouselConfig = $getCarouselConfig();
    $shouldShowDots = $shouldShowDots();
?>


<div
    x-data="strataCarousel(<?php echo \Illuminate\Support\Js::from($carouselConfig)->toHtml() ?>)"
    x-init="init()"
    <?php if($isWireModel): ?>
        x-modelable="currentSlide"
    <?php endif; ?>
    data-carousel-id="<?php echo e($carouselId); ?>"
    data-variant="<?php echo e($variant); ?>"
    <?php echo e($attributes->except(['wire:model', 'wire:model.self'])->merge([
        'class' => $getContainerClasses()
    ])); ?>

    x-show="totalSlides > 0"
>

    <div
        x-ref="scrollContainer"
        <?php if($hideScrollbar): ?>
            style="scrollbar-width: none; -ms-overflow-style: none; <?php echo e($getItemStyles()); ?>"
        <?php else: ?>
            style="<?php echo e($getItemStyles()); ?>"
        <?php endif; ?>
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            $getScrollContainerClasses(),
            'h-full',
            '[container-type:inline-size]',
            $hideScrollbar ? '[&::-webkit-scrollbar]:hidden' : ''
        ]); ?>"
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

        <?php echo e($slot); ?>

    </div>


    <!--[if BLOCK]><![endif]--><?php if($shouldShowDots || $showArrows): ?>
        <div class="flex items-center justify-between mt-4">

            <!--[if BLOCK]><![endif]--><?php if($shouldShowDots): ?>
                <!--[if BLOCK]><![endif]--><?php if(isset($dots)): ?>

                    <div class="carousel-custom-dots">
                        <?php echo e($dots); ?>

                    </div>
                <?php else: ?>

                    <div class="flex gap-1.5" role="tablist" aria-label="Carousel navigation">
                        <template x-for="slide in Math.min(totalSlides, 10)" :key="slide">
                            <button
                                type="button"
                                @click="goToSlide(slide - 1)"
                                :class="currentSlide === (slide - 1) ? '<?php echo e($getDotClasses()); ?> <?php echo e($getActiveDotClasses()); ?>' : '<?php echo e($getDotClasses()); ?>'"
                                :aria-selected="currentSlide === (slide - 1) ? 'true' : 'false'"
                                :aria-label="`Go to slide ${slide}`"
                                role="tab"
                                :tabindex="currentSlide === (slide - 1) ? 0 : -1"
                                data-carousel-control
                            ></button>
                        </template>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>

                <div></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


            <!--[if BLOCK]><![endif]--><?php if($showArrows): ?>
                <!--[if BLOCK]><![endif]--><?php if(isset($arrows)): ?>

                    <div class="carousel-custom-arrows">
                        <?php echo e($arrows); ?>

                    </div>
                <?php else: ?>

                    <div class="flex items-center gap-2">

                        <button
                            type="button"
                            x-show="showPrevArrow"
                            @click="previousSlide"
                            :disabled="!canGoPrevious"
                            class="<?php echo e($getArrowClasses()); ?>"
                            aria-label="Previous slide"
                            data-carousel-control
                        >
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-chevron-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                        </button>


                        <button
                            type="button"
                            x-show="showNextArrow"
                            @click="nextSlide"
                            :disabled="!canGoNext"
                            class="<?php echo e($getArrowClasses()); ?>"
                            aria-label="Next slide"
                            data-carousel-control
                        >
                            <?php if (isset($component)) { $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85 = $attributes; } ?>
<?php $component = Strata\UI\View\Components\Icon::resolve(['name' => 'heroicon-o-chevron-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('strata::icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Strata\UI\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $attributes = $__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__attributesOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85)): ?>
<?php $component = $__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85; ?>
<?php unset($__componentOriginalb9ec41bc2502d3fc3fbfc04390fa7a85); ?>
<?php endif; ?>
                        </button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->



    
    <div class="sr-only" :id="$id('carousel-instructions')">
        Use arrow keys to navigate between slides, Home to go to first slide, End to go to last slide, Escape to exit carousel focus.
    </div>

    
    <div
        class="sr-only"
        aria-live="polite"
        aria-atomic="true"
        id="<?php echo e($carouselId); ?>-status"
    >
        <span x-text="`Slide ${currentSlide + 1} of ${totalSlides}${autoplayEnabled ? ' (auto-advancing)' : ''}${totalSlides === 0 ? ' (empty carousel)' : ''}`"></span>
    </div>
    

    <div 
        x-show="totalSlides === 0"
        class="flex items-center justify-center <?php echo e($getSizeClasses()); ?> text-muted-foreground"
    >
        <div class="text-center">
            <div class="text-4xl mb-2">📷</div>
            <p class="text-sm">No content to display</p>
        </div>
    </div>
</div>


<?php if (! $__env->hasRenderedOnce('38bdb637-75f0-4fed-b20f-c5126613d410')): $__env->markAsRenderedOnce('38bdb637-75f0-4fed-b20f-c5126613d410'); ?>
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
<?php endif; ?><?php /**PATH C:\Users\chaab\Herd\strata\packages\strata-ui\src/../resources/views/components/carousel.blade.php ENDPATH**/ ?>