<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Main content component for application layouts.
 * Provides proper scrolling behavior alongside fixed sidebars.
 */
class MainContent extends Component
{
    public function __construct(
        public string $padding = 'responsive', // 'responsive', 'none', 'sm', 'md', 'lg'
        public bool $mobileHeader = false,
        public ?string $mobileHeaderClass = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.main-content');
    }

    /**
     * Get the CSS classes for content padding.
     */
    public function getPaddingClasses(): string
    {
        return match ($this->padding) {
            'none' => '',
            'sm' => 'p-2',
            'md' => 'p-4',
            'lg' => 'p-8',
            'responsive' => 'p-4 sm:p-6 lg:p-8',
            default => 'p-4 sm:p-6 lg:p-8',
        };
    }

    /**
     * Get the CSS classes for the mobile header.
     */
    public function getMobileHeaderClasses(): string
    {
        $baseClasses = 'sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-border bg-background/95 backdrop-blur px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:hidden';
        
        return $this->mobileHeaderClass 
            ? $baseClasses . ' ' . $this->mobileHeaderClass 
            : $baseClasses;
    }

    /**
     * Get the CSS classes for the main content container.
     */
    public function getContainerClasses(): string
    {
        return 'flex-1 min-w-0 h-screen flex flex-col';
    }

    /**
     * Get the CSS classes for the scrollable content area.
     */
    public function getContentClasses(): string
    {
        return 'flex-1 overflow-y-auto focus:outline-none ' . $this->getPaddingClasses();
    }
}