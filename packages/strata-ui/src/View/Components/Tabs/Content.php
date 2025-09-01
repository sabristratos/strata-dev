<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Tabs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tabs content component for individual tab panels.
 */
class Content extends Component
{
    public function __construct(
        public string $value,
        public bool $forceMount = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.tabs.content');
    }

    /**
     * Get the CSS classes for the tab content.
     */
    public function getContentClasses(): string
    {
        $classes = [
            'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2',
            'tab-radius'
        ];

        return implode(' ', $classes);
    }
}
