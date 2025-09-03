<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public function __construct(
        public ?string $href = null,
        public ?string $icon = null,
        public bool $active = false,
        public bool $nested = false,
        public bool $hideIcon = false,
    ) {}

    public function render(): View
    {
        return view('strata::components.nav-item');
    }

    /**
     * Get the base classes for the nav item.
     */
    public function getBaseClasses(): string
    {
        $classes = [
            'flex',
            'items-center',
            'w-full',
            'gap-3',
            'text-left',
            'button-radius',
            'transition-all',
            'duration-200',
        ];

        if ($this->nested) {
            $classes[] = 'nav-item-nested';
            
            // Add has-icon class when nested item has an icon
            if ($this->shouldShowIcon()) {
                $classes[] = 'has-icon';
            }
            
            $classes[] = 'px-3';
            $classes[] = 'pl-12';
            $classes[] = 'py-2';
            $classes[] = 'text-sm';
            $classes[] = 'font-normal';
        } else {
            $classes[] = 'px-3';
            $classes[] = 'py-2.5';
            $classes[] = 'text-sm';
            $classes[] = 'font-medium';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the active/inactive state classes.
     */
    public function getStateClasses(): string
    {
        if ($this->nested) {
            return $this->active
                ? 'bg-muted/50 text-foreground'
                : 'text-muted-foreground/70 hover:text-foreground';
        }

        return $this->active
            ? 'bg-muted text-foreground shadow-sm'
            : 'text-muted-foreground hover:text-foreground hover:bg-muted/60';
    }

    /**
     * Check if icon should be shown.
     */
    public function shouldShowIcon(): bool
    {
        if ($this->hideIcon) {
            return false;
        }

        return !empty($this->icon);
    }

    /**
     * Get icon classes.
     */
    public function getIconClasses(): string
    {
        return $this->nested 
            ? 'w-4 h-4 flex-shrink-0' 
            : 'w-5 h-5 flex-shrink-0';
    }
}
