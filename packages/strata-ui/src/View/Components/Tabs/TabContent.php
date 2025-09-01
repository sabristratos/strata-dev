<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Tabs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tab content component for displaying tab panel content.
 */
class TabContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $value  Unique identifier for the tab content
     * @param  bool  $forceMount  Whether to keep content mounted when inactive
     */
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