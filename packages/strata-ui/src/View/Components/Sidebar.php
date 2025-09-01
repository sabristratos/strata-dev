<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Sidebar component for navigation and layout management.
 * Supports multiple variants: overlay, push, fixed, and hybrid responsive behavior.
 */
class Sidebar extends Component
{
    public function __construct(
        public ?string $name = null,
        public string $variant = 'overlay',
        public string $width = 'w-64',
        public string $position = 'left',
        public bool $persistent = false,
        public bool $backdrop = true,
        public bool $collapsible = false,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.sidebar');
    }

    /**
     * Get the CSS classes for the sidebar variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'fixed' => 'relative',
            'push' => 'relative transition-transform duration-300',
            'hybrid' => 'fixed md:relative',
            default => 'fixed', // 'overlay'
        };
    }

    /**
     * Get the CSS classes for sidebar positioning.
     */
    public function getPositionClasses(): string
    {
        if ($this->variant === 'fixed') {
            return $this->position === 'right' ? 'ml-auto' : '';
        }

        return match ($this->position) {
            'right' => 'right-0',
            default => 'left-0', // 'left'
        };
    }

    /**
     * Get the CSS classes for the sidebar width.
     */
    public function getWidthClasses(): string
    {
        // Normalize width to valid Tailwind classes
        if (str_starts_with($this->width, 'w-')) {
            return $this->width;
        }

        return match ($this->width) {
            'sm' => 'w-48',
            'md' => 'w-64',
            'lg' => 'w-80',
            'xl' => 'w-96',
            default => 'w-64',
        };
    }

    /**
     * Get the CSS classes for the sidebar container.
     */
    public function getContainerClasses(): string
    {
        $classes = [
            'bg-card',
            'text-card-foreground',
            'border-border',
            'transition-transform',
            'duration-300',
            'ease-in-out',
            'grid',
            'grid-rows-[auto_1fr_auto]',
            $this->getWidthClasses(),
            $this->getVariantClasses(),
            $this->getPositionClasses(),
        ];

        // Add height and positioning based on variant
        if (in_array($this->variant, ['overlay', 'hybrid'])) {
            $classes[] = 'h-screen';
            $classes[] = 'top-0';
            $classes[] = 'z-50';
            $classes[] = 'shadow-xl';
        } else {
            // Fixed and push variants should also be full viewport height
            $classes[] = 'h-screen';
        }

        // Add border based on position and variant
        if ($this->variant !== 'overlay') {
            $classes[] = $this->position === 'right' ? 'border-l' : 'border-r';
        }

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the transform classes for hiding/showing the sidebar.
     */
    public function getTransformClasses(): string
    {
        if ($this->variant === 'fixed') {
            return ''; // Fixed sidebars don't transform
        }

        return match ($this->position) {
            'right' => 'translate-x-full',
            default => '-translate-x-full', // 'left'
        };
    }

    /**
     * Check if sidebar should show backdrop.
     */
    public function shouldShowBackdrop(): bool
    {
        return $this->backdrop && in_array($this->variant, ['overlay', 'hybrid']);
    }

    /**
     * Generate unique sidebar ID.
     */
    public function getSidebarId(): string
    {
        if ($this->name) {
            return "strata-sidebar-{$this->name}";
        }

        static $sidebarCount = 0;
        
        return 'strata-sidebar-'.(++$sidebarCount);
    }

    /**
     * Get the backdrop classes.
     */
    public function getBackdropClasses(): string
    {
        return 'fixed inset-0 bg-black/50 transition-opacity duration-300 z-40';
    }

    /**
     * Check if sidebar is collapsible.
     */
    public function isCollapsible(): bool
    {
        return $this->collapsible && in_array($this->variant, ['fixed', 'push']);
    }

    /**
     * Get accessibility attributes.
     */
    public function getAccessibilityAttributes(): array
    {
        return [
            'role' => 'navigation',
            'aria-label' => 'Sidebar navigation',
            'aria-hidden' => 'true', // Initially hidden, Alpine will manage this
        ];
    }
}