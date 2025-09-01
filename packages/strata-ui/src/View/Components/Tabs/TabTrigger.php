<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Tabs;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tab trigger component for tab navigation buttons.
 */
class TabTrigger extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $value  Unique identifier for the tab trigger
     * @param  bool  $disabled  Whether this tab trigger is disabled
     */
    public function __construct(
        public string $value,
        public bool $disabled = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.tabs.trigger');
    }

    /**
     * Get the CSS classes for the tab trigger.
     */
    public function getTriggerClasses(): string
    {
        $baseClasses = [
            'inline-flex items-center justify-center',
            'px-4 py-2',
            'text-sm font-medium',
            'transition-all duration-200',
            'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2',
            'whitespace-nowrap',
            'text-muted-foreground'
        ];

        if ($this->disabled) {
            $baseClasses[] = 'opacity-50 pointer-events-none cursor-not-allowed';
        } else {
            $baseClasses[] = 'cursor-pointer';
        }

        return implode(' ', $baseClasses);
    }
}