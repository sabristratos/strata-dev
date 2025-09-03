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
     */
    private function validateAndNormalizeConfiguration(): void
    {

        $this->validateVariant();
        $this->validateSize();
        $this->validateGap();
        $this->validateSnapAlign();


        $this->interval = max(1000, min(30000, $this->interval));


        $this->itemsPerView = $this->normalizeItemsPerView($this->itemsPerView);
    }

    private function validateVariant(): void
    {
        $validVariants = ['default', 'gallery', 'cards'];
        if (!in_array($this->variant, $validVariants)) {
            throw new \InvalidArgumentException(
                "Invalid carousel variant: {$this->variant}. Valid options are: " . implode(', ', $validVariants)
            );
        }
    }

    private function validateSize(): void
    {
        $validSizes = ['sm', 'md', 'lg'];
        if (!in_array($this->size, $validSizes)) {
            throw new \InvalidArgumentException(
                "Invalid carousel size: {$this->size}. Valid options are: " . implode(', ', $validSizes)
            );
        }
    }

    private function validateGap(): void
    {
        $validGaps = ['sm', 'md', 'lg'];
        if (!in_array($this->gap, $validGaps)) {
            throw new \InvalidArgumentException(
                "Invalid carousel gap: {$this->gap}. Valid options are: " . implode(', ', $validGaps)
            );
        }
    }

    private function validateSnapAlign(): void
    {
        $validAlignments = ['start', 'center', 'end'];
        if (!in_array($this->snapAlign, $validAlignments)) {
            throw new \InvalidArgumentException(
                "Invalid snap alignment: {$this->snapAlign}. Valid options are: " . implode(', ', $validAlignments)
            );
        }
    }

    /**
     * Normalize itemsPerView configuration.
     */
    private function normalizeItemsPerView($itemsPerView): array
    {

        if (is_string($itemsPerView) || is_numeric($itemsPerView)) {
            $count = max(1, min(10, (int) $itemsPerView));

            return ['default' => $count];
        }

        if (is_array($itemsPerView)) {
            $normalized = [];
            $validBreakpoints = ['default', 'sm', 'md', 'lg', 'xl'];

            foreach ($itemsPerView as $breakpoint => $count) {
                if (in_array($breakpoint, $validBreakpoints)) {
                    $normalized[$breakpoint] = max(1, min(10, (int) $count));
                }
            }


            if (! isset($normalized['default'])) {
                $normalized['default'] = 1;
            }

            return $normalized;
        }


        return ['default' => 1];
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

        return empty($this->slot->toHtml()) || trim($this->slot->toHtml()) === '';
    }

    /**
     * Get the maximum items per view across all breakpoints.
     */
    public function getMaxItemsPerView(): int
    {
        if (empty($this->itemsPerView)) {
            return 1;
        }

        return max(array_values($this->itemsPerView));
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
        return implode(' ', [
            'flex-shrink-0',
            $this->getSnapAlignClasses(),
        ]);
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
     * Get inline styles with CSS custom properties for item widths.
     */
    public function getItemStyles(): string
    {
        $styles = [];

        foreach (['default', 'sm', 'md', 'lg', 'xl'] as $breakpoint) {
            if (isset($this->itemsPerView[$breakpoint])) {
                $items = $this->itemsPerView[$breakpoint];
                $width = $this->calculateItemWidth($items);

                if ($breakpoint === 'default') {
                    $styles[] = "--carousel-item-width: {$width}";
                } else {
                    $styles[] = "--carousel-item-width-{$breakpoint}: {$width}";
                }
            }
        }

        return implode('; ', $styles);
    }

    /**
     * Calculate item width using CSS container queries for precise control.
     */
    private function calculateItemWidth(int $items): string
    {
        if ($items <= 0 || $items === 1) {
            return '100cqw';
        }


        $gapSpacing = match ($this->gap) {
            'sm' => 'theme(spacing.2)', // 0.5rem
            'lg' => 'theme(spacing.6)', // 1.5rem
            default => 'theme(spacing.4)', // 1rem for md
        };


        $totalGaps = $items - 1;


        return "calc(100cqw / {$items} - {$gapSpacing} * {$totalGaps} / {$items})";
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
     * Check if dots should be shown - automatically hide for multi-item carousels.
     */
    public function shouldShowDots(): bool
    {

        return $this->showDots && $this->getMaxItemsPerView() === 1;
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
            'showDots' => $this->shouldShowDots(), // Use computed value
            'hideScrollbar' => $this->hideScrollbar,
            'itemClasses' => $this->getItemClasses(),
        ];
    }
}
