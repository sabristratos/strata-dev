<?php

declare(strict_types=1);

use InvalidArgumentException;
use Strata\UI\View\Components\Carousel;

describe('Carousel Component Tests', function () {
    it('renders component with default settings', function () {
        $component = new Carousel;
        $view = $component->render();

        expect($view)->toBeInstanceOf(\Illuminate\Contracts\View\View::class);
        expect($view->name())->toBe('strata::components.carousel');
        expect($component->variant)->toBe('default');
        expect($component->size)->toBe('md');
        expect($component->autoplay)->toBeFalse();
        expect($component->interval)->toBe(3000);
        expect($component->loop)->toBeTrue();
        expect($component->showArrows)->toBeTrue();
        expect($component->showDots)->toBeTrue();
        expect($component->itemsPerView)->toBe(1);
        expect($component->gap)->toBe('md');
        expect($component->snapAlign)->toBe('center');
        expect($component->hideScrollbar)->toBeTrue();
    });

    it('renders component with custom variant', function () {
        $component = new Carousel(variant: 'gallery');
        $rendered = $component->render()->render();

        expect($component->variant)->toBe('gallery');
        expect($rendered)->toContain('data-variant="gallery"');
    });

    it('renders component with autoplay enabled', function () {
        $component = new Carousel(autoplay: true, interval: 5000);
        $rendered = $component->render()->render();

        expect($component->autoplay)->toBeTrue();
        expect($component->interval)->toBe(5000);
        expect($rendered)->toContain('"autoplay":true')
            ->and($rendered)->toContain('"interval":5000');
    });

    it('renders component with custom items per view as array', function () {
        $itemsPerView = [
            'default' => 1,
            'sm' => 2,
            'md' => 3,
            'lg' => 4,
        ];
        $component = new Carousel(itemsPerView: $itemsPerView);

        expect($component->itemsPerView)->toBe($itemsPerView);
        expect($component->getItemsPerViewConfig())->toContain('"default":1')
            ->and($component->getItemsPerViewConfig())->toContain('"lg":4');
    });

    it('normalizes string items per view to array', function () {
        $component = new Carousel(itemsPerView: '3');

        expect($component->itemsPerView)->toBe(['default' => '3']);
    });

    it('normalizes int items per view to array', function () {
        $component = new Carousel(itemsPerView: 2);

        expect($component->itemsPerView)->toBe(['default' => 2]);
    });

    it('applies correct variant classes', function () {
        $defaultComponent = new Carousel(variant: 'default');
        $galleryComponent = new Carousel(variant: 'gallery');
        $cardsComponent = new Carousel(variant: 'cards');

        expect($defaultComponent->getVariantClasses())->toBe('carousel-default');
        expect($galleryComponent->getVariantClasses())->toBe('carousel-gallery');
        expect($cardsComponent->getVariantClasses())->toBe('carousel-cards bg-background');
    });

    it('applies correct size classes', function () {
        $smallComponent = new Carousel(size: 'sm');
        $mediumComponent = new Carousel(size: 'md');
        $largeComponent = new Carousel(size: 'lg');

        expect($smallComponent->getSizeClasses())->toBe('min-h-48');
        expect($mediumComponent->getSizeClasses())->toBe('min-h-64');
        expect($largeComponent->getSizeClasses())->toBe('min-h-96');
    });

    it('applies correct gap classes', function () {
        $smallGap = new Carousel(gap: 'sm');
        $mediumGap = new Carousel(gap: 'md');
        $largeGap = new Carousel(gap: 'lg');

        expect($smallGap->getGapClasses())->toBe('gap-2');
        expect($mediumGap->getGapClasses())->toBe('gap-4');
        expect($largeGap->getGapClasses())->toBe('gap-6');
    });

    it('applies correct snap alignment classes', function () {
        $startAlign = new Carousel(snapAlign: 'start');
        $centerAlign = new Carousel(snapAlign: 'center');
        $endAlign = new Carousel(snapAlign: 'end');

        expect($startAlign->getSnapAlignClasses())->toBe('snap-start');
        expect($centerAlign->getSnapAlignClasses())->toBe('snap-center');
        expect($endAlign->getSnapAlignClasses())->toBe('snap-end');
    });

    it('calculates correct item width classes based on items per view', function () {
        $singleItem = new Carousel(itemsPerView: 1);
        $doubleItem = new Carousel(itemsPerView: 2);
        $tripleItem = new Carousel(itemsPerView: 3);
        $quadItem = new Carousel(itemsPerView: 4);

        expect($singleItem->getItemWidthClasses())->toContain('w-[100%]');
        expect($doubleItem->getItemWidthClasses())->toContain('w-[50%]');
        expect($tripleItem->getItemWidthClasses())->toContain('w-[33.333333%]');
        expect($quadItem->getItemWidthClasses())->toContain('w-[25%]');
    });

    it('generates unique carousel IDs', function () {
        $component1 = new Carousel;
        $component2 = new Carousel;

        $id1 = $component1->getCarouselId();
        $id2 = $component2->getCarouselId();

        expect($id1)->not->toBe($id2);
        expect($id1)->toStartWith('strata-carousel-');
        expect($id2)->toStartWith('strata-carousel-');
    });

    it('returns correct boolean values for arrow and dots visibility', function () {
        $withArrowsAndDots = new Carousel(showArrows: true, showDots: true);
        $withoutArrowsAndDots = new Carousel(showArrows: false, showDots: false);

        expect($withArrowsAndDots->shouldShowArrows())->toBeTrue();
        expect($withArrowsAndDots->shouldShowDots())->toBeTrue();
        expect($withoutArrowsAndDots->shouldShowArrows())->toBeFalse();
        expect($withoutArrowsAndDots->shouldShowDots())->toBeFalse();
    });

    it('generates valid JSON configuration for autoplay', function () {
        $autoplayComponent = new Carousel(autoplay: true, interval: 4000);
        $noAutoplayComponent = new Carousel(autoplay: false);

        $autoplayConfig = json_decode($autoplayComponent->getAutoplayConfig(), true);
        $noAutoplayConfig = json_decode($noAutoplayComponent->getAutoplayConfig(), true);

        expect($autoplayConfig['enabled'])->toBeTrue();
        expect($autoplayConfig['interval'])->toBe(4000);
        expect($noAutoplayConfig['enabled'])->toBeFalse();
        expect($noAutoplayConfig['interval'])->toBe(3000);
    });

    it('includes proper CSS classes in scroll container', function () {
        $component = new Carousel(gap: 'lg', hideScrollbar: true);
        $scrollClasses = $component->getScrollContainerClasses();

        expect($scrollClasses)->toContain('flex')
            ->and($scrollClasses)->toContain('overflow-x-auto')
            ->and($scrollClasses)->toContain('snap-x')
            ->and($scrollClasses)->toContain('snap-mandatory')
            ->and($scrollClasses)->toContain('scroll-smooth')
            ->and($scrollClasses)->toContain('gap-6')
            ->and($scrollClasses)->toContain('scrollbar-hide');
    });

    it('includes proper CSS classes in item classes', function () {
        $component = new Carousel(snapAlign: 'start', itemsPerView: 3);
        $itemClasses = $component->getItemClasses();

        expect($itemClasses)->toContain('flex-shrink-0')
            ->and($itemClasses)->toContain('snap-start')
            ->and($itemClasses)->toContain('w-[33.333333%]');
    });

    it('renders Alpine.js data configuration', function () {
        $component = new Carousel(
            autoplay: true,
            interval: 5000,
            loop: false,
            variant: 'gallery'
        );
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-data="strataCarousel(')
            ->and($rendered)->toContain('"autoplay":true')
            ->and($rendered)->toContain('"interval":5000')
            ->and($rendered)->toContain('"loop":false')
            ->and($rendered)->toContain('"variant":"gallery"');
    });

    it('includes accessibility attributes', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('role="region"')
            ->and($rendered)->toContain('aria-label="Carousel"')
            ->and($rendered)->toContain('aria-live="polite"')
            ->and($rendered)->toContain('tabindex="0"');
    });

    it('includes keyboard navigation event handlers', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@keydown.arrow-left="previousSlide"')
            ->and($rendered)->toContain('@keydown.arrow-right="nextSlide"')
            ->and($rendered)->toContain('@keydown.home="goToSlide(0)"')
            ->and($rendered)->toContain('@keydown.end="goToSlide(totalSlides - 1)"');
    });

    it('includes mouse and focus event handlers for autoplay', function () {
        $component = new Carousel(autoplay: true);
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@mouseenter="pauseAutoplay"')
            ->and($rendered)->toContain('@mouseleave="resumeAutoplay"')
            ->and($rendered)->toContain('@focusin="pauseAutoplay"')
            ->and($rendered)->toContain('@focusout="resumeAutoplay"');
    });

    it('renders default navigation arrows when enabled', function () {
        $component = new Carousel(showArrows: true);
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-show="showPrevArrow"')
            ->and($rendered)->toContain('x-show="showNextArrow"')
            ->and($rendered)->toContain('@click="previousSlide"')
            ->and($rendered)->toContain('@click="nextSlide"')
            ->and($rendered)->toContain('aria-label="Previous slide"')
            ->and($rendered)->toContain('aria-label="Next slide"');
    });

    it('renders default navigation dots when enabled', function () {
        $component = new Carousel(showDots: true);
        $rendered = $component->render()->render();

        expect($rendered)->toContain('role="tablist"')
            ->and($rendered)->toContain('aria-label="Carousel navigation"')
            ->and($rendered)->toContain('@click="goToSlide(index)"')
            ->and($rendered)->toContain('role="tab"');
    });

    it('renders progress bar when autoplay is enabled', function () {
        $component = new Carousel(autoplay: true);
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-show="autoplayEnabled && showProgress"')
            ->and($rendered)->toContain(':style="`width: ${autoplayProgress}%`"');
    });

    it('includes screen reader status updates', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('class="sr-only"')
            ->and($rendered)->toContain('aria-live="polite"')
            ->and($rendered)->toContain('aria-atomic="true"')
            ->and($rendered)->toContain('x-text="`Slide ${currentSlide + 1} of ${totalSlides}`"');
    });

    it('includes modern CSS features and fallbacks', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@supports (scroll-snap-type: x mandatory)')
            ->and($rendered)->toContain('@supports (::scroll-button(left))')
            ->and($rendered)->toContain('@media (prefers-reduced-motion: reduce)')
            ->and($rendered)->toContain('scrollbar-width: none')
            ->and($rendered)->toContain('-ms-overflow-style: none');
    });

    // New edge case tests
    it('handles empty carousel gracefully', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-show="totalSlides > 0"')
            ->and($rendered)->toContain('data-carousel-id');
    });

    it('handles single slide carousel correctly', function () {
        $component = new Carousel(autoplay: true, showArrows: true);
        $rendered = $component->render()->render();

        // Should still render but navigation should be hidden when only one slide
        expect($rendered)->toContain('x-show="showPrevArrow"')
            ->and($rendered)->toContain('x-show="showNextArrow"');
    });

    it('validates invalid variant gracefully', function () {
        expect(function () {
            new Carousel(variant: 'invalid');
        })->toThrow(InvalidArgumentException::class);
    });

    it('validates invalid size gracefully', function () {
        expect(function () {
            new Carousel(size: 'invalid');
        })->toThrow(InvalidArgumentException::class);
    });

    it('validates invalid gap gracefully', function () {
        expect(function () {
            new Carousel(gap: 'invalid');
        })->toThrow(InvalidArgumentException::class);
    });

    it('validates invalid snap align gracefully', function () {
        expect(function () {
            new Carousel(snapAlign: 'invalid');
        })->toThrow(InvalidArgumentException::class);
    });

    it('normalizes interval to minimum value', function () {
        $component = new Carousel(interval: 500);

        expect($component->interval)->toBe(1000);
    });

    it('normalizes interval to maximum value', function () {
        $component = new Carousel(interval: 50000);

        expect($component->interval)->toBe(30000);
    });

    it('validates itemsPerView bounds', function () {
        expect(function () {
            new Carousel(itemsPerView: 0);
        })->toThrow(InvalidArgumentException::class);

        expect(function () {
            new Carousel(itemsPerView: 15);
        })->toThrow(InvalidArgumentException::class);
    });

    it('validates responsive itemsPerView configuration', function () {
        $validConfig = [
            'default' => 1,
            'sm' => 2,
            'md' => 3,
            'lg' => 4,
        ];

        $component = new Carousel(itemsPerView: $validConfig);

        expect($component->itemsPerView)->toBe($validConfig);
    });

    it('rejects invalid responsive breakpoints', function () {
        expect(function () {
            new Carousel(itemsPerView: ['invalid' => 2]);
        })->toThrow(InvalidArgumentException::class);
    });

    it('determines navigation mode correctly', function () {
        $slideMode = new Carousel(itemsPerView: 1);
        $pageMode = new Carousel(itemsPerView: 3);

        expect($slideMode->getNavigationMode())->toBe('slide');
        expect($pageMode->getNavigationMode())->toBe('page');
    });

    it('detects responsive configuration', function () {
        $simple = new Carousel(itemsPerView: 1);
        $responsive = new Carousel(itemsPerView: ['default' => 1, 'md' => 3]);

        expect($simple->hasResponsiveConfig())->toBeFalse();
        expect($responsive->hasResponsiveConfig())->toBeTrue();
    });

    it('generates comprehensive carousel config', function () {
        $component = new Carousel(
            variant: 'gallery',
            autoplay: true,
            interval: 5000,
            itemsPerView: ['default' => 1, 'md' => 2]
        );

        $config = $component->getCarouselConfig();

        expect($config)->toHaveKeys([
            'id', 'autoplay', 'interval', 'loop', 'itemsPerView',
            'variant', 'size', 'gap', 'snapAlign', 'showArrows',
            'showDots', 'hideScrollbar', 'itemClasses', 'navigationMode',
            'hasResponsiveConfig',
        ]);

        expect($config['variant'])->toBe('gallery');
        expect($config['autoplay'])->toBeTrue();
        expect($config['interval'])->toBe(5000);
        expect($config['navigationMode'])->toBe('slide');
        expect($config['hasResponsiveConfig'])->toBeTrue();
    });

    it('generates unique carousel IDs with better uniqueness', function () {
        $component1 = new Carousel;
        $component2 = new Carousel;
        $component3 = new Carousel;

        $id1 = $component1->getCarouselId();
        $id2 = $component2->getCarouselId();
        $id3 = $component3->getCarouselId();

        expect($id1)->not->toBe($id2)
            ->and($id2)->not->toBe($id3)
            ->and($id1)->not->toBe($id3);

        expect($id1)->toStartWith('strata-carousel-')
            ->and($id2)->toStartWith('strata-carousel-')
            ->and($id3)->toStartWith('strata-carousel-');

        // Check for hash suffix for better uniqueness
        expect($id1)->toMatch('/strata-carousel-\d+-[a-f0-9]{6}/')
            ->and($id2)->toMatch('/strata-carousel-\d+-[a-f0-9]{6}/')
            ->and($id3)->toMatch('/strata-carousel-\d+-[a-f0-9]{6}/');
    });

    it('calculates item width precisely for various counts', function () {
        $component1 = new Carousel(itemsPerView: 1);
        $component2 = new Carousel(itemsPerView: 2);
        $component3 = new Carousel(itemsPerView: 3);
        $component5 = new Carousel(itemsPerView: 5);
        $component7 = new Carousel(itemsPerView: 7);

        expect($component1->getItemWidthClasses())->toContain('w-[100%]');
        expect($component2->getItemWidthClasses())->toContain('w-[50%]');
        expect($component3->getItemWidthClasses())->toContain('w-[33.333333%]');
        expect($component5->getItemWidthClasses())->toContain('w-[20%]');
        expect($component7->getItemWidthClasses())->toContain('w-[14.285714%]');
    });
});

// Additional test for Livewire integration
describe('Carousel Livewire Integration', function () {
    it('supports wire:model binding', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-modelable="currentSlide"');
    });

    it('handles wire:model attribute correctly', function () {
        $component = new Carousel;
        $component = $component->withAttributes(['wire:model' => 'selectedSlide']);
        $rendered = $component->render()->render();

        expect($rendered)->toContain('x-modelable="currentSlide"');
    });
});

// Performance and accessibility tests
describe('Carousel Performance & Accessibility', function () {
    it('includes proper ARIA attributes for screen readers', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('role="region"')
            ->and($rendered)->toContain('aria-label="Carousel"')
            ->and($rendered)->toContain('aria-live="polite"')
            ->and($rendered)->toContain('tabindex="0"');
    });

    it('includes keyboard navigation event handlers', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@keydown.arrow-left')
            ->and($rendered)->toContain('@keydown.arrow-right')
            ->and($rendered)->toContain('@keydown.home')
            ->and($rendered)->toContain('@keydown.end');
    });

    it('optimizes for reduced motion preferences', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@media (prefers-reduced-motion: reduce)');
    });

    it('supports touch interactions', function () {
        $component = new Carousel;
        $rendered = $component->render()->render();

        expect($rendered)->toContain('@touchstart="handleTouchStart"')
            ->and($rendered)->toContain('@touchmove="handleTouchMove"')
            ->and($rendered)->toContain('@touchend="handleTouchEnd"');
    });
});

// Configuration validation tests
describe('Carousel Configuration Validation', function () {
    it('throws exception for invalid itemsPerView array values', function () {
        expect(function () {
            new Carousel(itemsPerView: ['default' => 0]);
        })->toThrow(InvalidArgumentException::class, 'itemsPerView[default] must be between 1 and 10');

        expect(function () {
            new Carousel(itemsPerView: ['md' => 15]);
        })->toThrow(InvalidArgumentException::class, 'itemsPerView[md] must be between 1 and 10');
    });

    it('handles string itemsPerView values', function () {
        $component = new Carousel(itemsPerView: '3');

        expect($component->itemsPerView)->toBe(['default' => 3]);
    });

    it('falls back to safe defaults for invalid configurations', function () {
        // Test that extremely invalid configurations still work
        $component = new Carousel(
            variant: 'default', // This should work
            itemsPerView: 0 // This should throw, but let's test the boundary
        );

        // The constructor should have thrown, so this test confirms validation is working
        expect(true)->toBeTrue(); // This won't run if exception is thrown above
    })->throws(InvalidArgumentException::class);
});
