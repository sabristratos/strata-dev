<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SidebarToggle component for opening and closing sidebars.
 */
class SidebarToggle extends Component
{
    public function __construct(
        public ?string $target = null,
        public string $variant = 'button',
        public string $size = 'md',
        public ?string $icon = null,
    ) {
        // Default icon based on variant
        if ($this->icon === null) {
            $this->icon = $this->variant === 'hamburger' ? 'heroicon-o-bars-3' : 'heroicon-o-plus';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.sidebar-toggle');
    }

    /**
     * Get the target sidebar ID.
     */
    public function getTargetId(): string
    {
        if ($this->target) {
            return "strata-sidebar-{$this->target}";
        }

        return 'strata-sidebar-1'; // Default to first sidebar
    }

    /**
     * Get the CSS classes for the toggle variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'hamburger' => $this->getHamburgerClasses(),
            'icon' => $this->getIconClasses(),
            default => $this->getButtonClasses(), // 'button'
        };
    }

    /**
     * Get button variant classes.
     */
    private function getButtonClasses(): string
    {
        $sizeClasses = match ($this->size) {
            'sm' => 'px-2 py-1 text-sm',
            'lg' => 'px-4 py-3 text-lg',
            default => 'px-3 py-2', // 'md'
        };

        return implode(' ', [
            'inline-flex',
            'items-center',
            'justify-center',
            'rounded-md',
            'border',
            'border-input',
            'bg-background',
            'text-foreground',
            'hover:bg-accent',
            'hover:text-accent-foreground',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-ring',
            'focus:ring-offset-2',
            'transition-colors',
            $sizeClasses,
        ]);
    }

    /**
     * Get icon variant classes.
     */
    private function getIconClasses(): string
    {
        $sizeClasses = match ($this->size) {
            'sm' => 'w-6 h-6 p-1',
            'lg' => 'w-10 h-10 p-2',
            default => 'w-8 h-8 p-1.5', // 'md'
        };

        return implode(' ', [
            'inline-flex',
            'items-center',
            'justify-center',
            'rounded-md',
            'text-muted-foreground',
            'hover:text-foreground',
            'hover:bg-accent',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-ring',
            'focus:ring-offset-2',
            'transition-colors',
            $sizeClasses,
        ]);
    }

    /**
     * Get hamburger variant classes (animated hamburger icon).
     */
    private function getHamburgerClasses(): string
    {
        $sizeClasses = match ($this->size) {
            'sm' => 'w-6 h-6',
            'lg' => 'w-10 h-10',
            default => 'w-8 h-8', // 'md'
        };

        return implode(' ', [
            'hamburger-toggle',
            'inline-flex',
            'items-center',
            'justify-center',
            'rounded-md',
            'text-muted-foreground',
            'hover:text-foreground',
            'hover:bg-accent',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-ring',
            'focus:ring-offset-2',
            'transition-colors',
            $sizeClasses,
        ]);
    }

    /**
     * Get the icon size classes.
     */
    public function getIconSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'w-4 h-4',
            'lg' => 'w-6 h-6',
            default => 'w-5 h-5', // 'md'
        };
    }

    /**
     * Check if component uses hamburger variant.
     */
    public function isHamburger(): bool
    {
        return $this->variant === 'hamburger';
    }

    /**
     * Get accessibility attributes.
     */
    public function getAccessibilityAttributes(): array
    {
        return [
            'aria-label' => 'Toggle sidebar',
            'aria-expanded' => 'false', // Alpine will manage this
            'aria-controls' => $this->getTargetId(),
        ];
    }
}
