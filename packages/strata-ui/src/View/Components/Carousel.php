<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Carousel component for displaying sliding content with modern CSS scroll-snap.
 */
class Carousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $variant  The carousel variant (default, gallery, cards)
     * @param  string  $size  The carousel size (sm, md, lg)
     * @param  bool  $autoplay  Whether the carousel should autoplay
     * @param  int  $interval  Autoplay interval in milliseconds
     * @param  bool  $loop  Whether the carousel should loop infinitely
     * @param  bool  $showArrows  Whether to show navigation arrows
     * @param  bool  $showDots  Whether to show navigation dots
     * @param  array|string|int  $itemsPerView  Number of items per view (responsive)
     * @param  string  $gap  Gap between items (sm, md, lg)
     * @param  string  $snapAlign  Snap alignment (start, center, end)
     * @param  bool  $hideScrollbar  Whether to hide the scrollbar
     *
     * @throws \InvalidArgumentException When configuration values are invalid
     */
    public function __construct(
        public string $variant = 'default',
        public string $size = 'md',
        public bool $autoplay = false,
        public int $interval = 3000,
        public bool $loop = true,
        public bool $showArrows = true,
        public bool $showDots = true,
        public array|string|int $itemsPerView = 1,
        public string $gap = 'md',
        public string $snapAlign = 'center',
        public bool $hideScrollbar = true,
    ) {
        $this->validateAndNormalizeConfiguration();
    }

    /**
     * Validate and normalize component configuration.
     *
     * @throws \InvalidArgumentException When configuration values are invalid
     */
    private function validateAndNormalizeConfiguration(): void
    {
        // Validate variant
        $validVariants = ['default', 'gallery', 'cards'];
        if (! in_array($this->variant, $validVariants)) {
            throw new \InvalidArgumentException(
                "Invalid variant '{$this->variant}'. Must be one of: ".implode(', ', $validVariants)
            );
        }

        // Validate size
        $validSizes = ['sm', 'md', 'lg'];
        if (! in_array($this->size, $validSizes)) {
            throw new \InvalidArgumentException(
                "Invalid size '{$this->size}'. Must be one of: ".implode(', ', $validSizes)
            );
        }

        // Validate and normalize interval
        if ($this->interval < 1000) {
            $this->interval = 1000; // Minimum 1 second
        } elseif ($this->interval > 30000) {
            $this->interval = 30000; // Maximum 30 seconds
        }

        // Validate gap
        $validGaps = ['sm', 'md', 'lg'];
        if (! in_array($this->gap, $validGaps)) {
            throw new \InvalidArgumentException(
                "Invalid gap '{$this->gap}'. Must be one of: ".implode(', ', $validGaps)
            );
        }

        // Validate snapAlign
        $validSnapAligns = ['start', 'center', 'end'];
        if (! in_array($this->snapAlign, $validSnapAligns)) {
            throw new \InvalidArgumentException(
                "Invalid snapAlign '{$this->snapAlign}'. Must be one of: ".implode(', ', $validSnapAligns)
            );
        }

        // Normalize and validate itemsPerView
        $this->itemsPerView = $this->normalizeItemsPerView($this->itemsPerView);
    }

    /**
     * Normalize itemsPerView configuration and validate values.
     *
     * @param  array|string|int  $itemsPerView  The items per view configuration
     * @return array Normalized configuration
     *
     * @throws \InvalidArgumentException When itemsPerView values are invalid
     */
    private function normalizeItemsPerView($itemsPerView): array
    {
        // Convert single values to array format
        if (is_string($itemsPerView) || is_numeric($itemsPerView)) {
            $count = (int) $itemsPerView;
            $this->validateItemCount($count, 'default');

            return ['default' => $count];
        }

        if (is_array($itemsPerView)) {
            $normalized = [];
            $validBreakpoints = ['default', 'sm', 'md', 'lg', 'xl'];

            foreach ($itemsPerView as $breakpoint => $count) {
                if (! in_array($breakpoint, $validBreakpoints)) {
                    throw new \InvalidArgumentException(
                        "Invalid breakpoint '{$breakpoint}'. Must be one of: ".implode(', ', $validBreakpoints)
                    );
                }

                $count = (int) $count;
                $this->validateItemCount($count, $breakpoint);
                $normalized[$breakpoint] = $count;
            }

            // Ensure we have at least a default value
            if (! isset($normalized['default'])) {
                $normalized['default'] = 1;
            }

            return $normalized;
        }

        // Fallback to safe default
        return ['default' => 1];
    }

    /**
     * Validate item count for a specific breakpoint.
     *
     * @param  int  $count  The item count to validate
     * @param  string  $breakpoint  The breakpoint name
     *
     * @throws \InvalidArgumentException When count is invalid
     */
    private function validateItemCount(int $count, string $breakpoint): void
    {
        if ($count < 1 || $count > 10) {
            throw new \InvalidArgumentException(
                "itemsPerView[{$breakpoint}] must be between 1 and 10, got: {$count}"
            );
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.carousel');
    }

    /**
     * Get the CSS classes for the carousel variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'gallery' => 'carousel-gallery',
            'cards' => 'carousel-cards bg-background',
            default => 'carousel-default',
        };
    }

    /**
     * Get the CSS classes for the carousel size.
     */
    public function getSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'min-h-48',
            'lg' => 'min-h-96',
            default => 'min-h-64',
        };
    }

    /**
     * Check if carousel should show empty state.
     */
    public function shouldShowEmptyState(): bool
    {
        // This would typically be determined by the presence of slot content,
        // but we can't easily check that here. The Blade template should handle this.
        return false;
    }

    /**
     * Get navigation mode based on items per view configuration.
     *
     * @return string 'slide' or 'page'
     */
    public function getNavigationMode(): string
    {
        $defaultItems = $this->itemsPerView['default'] ?? 1;

        return $defaultItems > 1 ? 'page' : 'slide';
    }

    /**
     * Check if carousel has responsive configuration.
     */
    public function hasResponsiveConfig(): bool
    {
        return count($this->itemsPerView) > 1;
    }

    /**
     * Get the CSS classes for carousel container.
     */
    public function getContainerClasses(): string
    {
        $classes = [
            'relative',
            'w-full',
            $this->getSizeClasses(),
            $this->getVariantClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the CSS classes for the scroll container.
     */
    public function getScrollContainerClasses(): string
    {
        $classes = [
            'flex',
            'overflow-x-auto',
            'snap-x',
            'snap-mandatory',
            'scroll-smooth',
            $this->getGapClasses(),
            $this->hideScrollbar ? 'scrollbar-hide' : '',
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the CSS classes for carousel items.
     */
    public function getItemClasses(): string
    {
        $classes = [
            'flex-shrink-0',
            $this->getSnapAlignClasses(),
            $this->getItemWidthClasses(),
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the CSS classes for gap spacing.
     */
    public function getGapClasses(): string
    {
        return match ($this->gap) {
            'sm' => 'gap-2',
            'lg' => 'gap-6',
            default => 'gap-4',
        };
    }

    /**
     * Get the CSS classes for snap alignment.
     */
    public function getSnapAlignClasses(): string
    {
        return match ($this->snapAlign) {
            'start' => 'snap-start',
            'end' => 'snap-end',
            default => 'snap-center',
        };
    }

    /**
     * Get the CSS classes for item width based on responsive itemsPerView with improved calculations.
     */
    public function getItemWidthClasses(): string
    {
        $classes = [];

        // Set flex properties for proper carousel behavior
        $classes[] = 'min-w-0'; // Allow flex items to shrink below content size
        $classes[] = 'flex-shrink-0'; // Prevent flex shrinking

        // Add width classes for each breakpoint
        foreach (['default', 'sm', 'md', 'lg', 'xl'] as $breakpoint) {
            if (isset($this->itemsPerView[$breakpoint])) {
                $items = $this->itemsPerView[$breakpoint];
                $width = $this->calculateItemWidth($items);
                $prefix = $breakpoint === 'default' ? '' : $breakpoint.':';
                $classes[] = "{$prefix}w-[{$width}]";
            }
        }

        return implode(' ', array_filter($classes));
    }

    /**
     * Calculate item width percentage based on items per view.
     *
     * @param  int  $items  Number of items per view
     * @return string CSS width value
     */
    private function calculateItemWidth(int $items): string
    {
        if ($items <= 0) {
            return '100%';
        }

        // Use precise percentage calculation
        $percentage = (100 / $items);

        // Round to reasonable precision to avoid CSS issues
        if ($percentage === floor($percentage)) {
            return $percentage.'%';
        }

        return number_format($percentage, 6, '.', '').'%';
    }

    /**
     * Get the CSS classes for navigation arrows.
     */
    public function getArrowClasses(): string
    {
        return 'inline-flex items-center justify-center w-8 h-8 text-muted-foreground hover:text-foreground bg-background hover:bg-accent border border-border hover:border-accent-foreground/20 rounded-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-background disabled:hover:text-muted-foreground';
    }

    /**
     * Get the CSS classes for navigation dots.
     */
    public function getDotsContainerClasses(): string
    {
        return 'flex gap-1.5';
    }

    /**
     * Get the CSS classes for individual dots.
     */
    public function getDotClasses(): string
    {
        return 'w-2 h-2 rounded-full bg-muted hover:bg-muted-foreground/40 transition-all duration-200 cursor-pointer';
    }

    /**
     * Get the active dot CSS classes.
     */
    public function getActiveDotClasses(): string
    {
        return '!bg-primary w-4';
    }

    /**
     * Get the CSS classes for the combined navigation container.
     */
    public function getNavigationContainerClasses(): string
    {
        return 'flex items-center justify-between mt-4';
    }

    /**
     * Get the CSS classes for the arrow navigation container.
     */
    public function getArrowContainerClasses(): string
    {
        return 'flex items-center gap-2';
    }

    /**
     * Generate unique carousel ID with better uniqueness.
     */
    public function getCarouselId(): string
    {
        static $carouselCount = 0;

        return 'strata-carousel-'.(++$carouselCount).'-'.substr(md5(uniqid()), 0, 6);
    }

    /**
     * Check if arrows should be shown.
     */
    public function shouldShowArrows(): bool
    {
        return $this->showArrows;
    }

    /**
     * Check if dots should be shown.
     */
    public function shouldShowDots(): bool
    {
        return $this->showDots;
    }

    /**
     * Get autoplay configuration as JSON.
     */
    public function getAutoplayConfig(): string
    {
        return json_encode([
            'enabled' => $this->autoplay,
            'interval' => $this->interval,
        ], JSON_THROW_ON_ERROR);
    }

    /**
     * Get responsive items per view configuration as JSON.
     */
    public function getItemsPerViewConfig(): string
    {
        return json_encode($this->itemsPerView, JSON_THROW_ON_ERROR);
    }

    /**
     * Get comprehensive carousel configuration for JavaScript.
     *
     * @return array Complete configuration array
     */
    public function getCarouselConfig(): array
    {
        return [
            'id' => $this->getCarouselId(),
            'autoplay' => $this->autoplay,
            'interval' => $this->interval,
            'loop' => $this->loop,
            'itemsPerView' => $this->itemsPerView,
            'variant' => $this->variant,
            'size' => $this->size,
            'gap' => $this->gap,
            'snapAlign' => $this->snapAlign,
            'showArrows' => $this->showArrows,
            'showDots' => $this->showDots,
            'hideScrollbar' => $this->hideScrollbar,
            'itemClasses' => $this->getItemClasses(),
            'navigationMode' => $this->getNavigationMode(),
            'hasResponsiveConfig' => $this->hasResponsiveConfig(),
        ];
    }
}
