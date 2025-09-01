<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Accordion;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Accordion item component for individual collapsible panels.
 */
class Item extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $value  Unique identifier for this accordion item
     * @param  string  $title  The title text for the accordion trigger
     * @param  bool  $disabled  Whether this item is disabled
     * @param  string|null  $icon  Custom icon name for the trigger
     */
    public function __construct(
        public string $value,
        public string $title = '',
        public bool $disabled = false,
        public ?string $icon = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.accordion.item');
    }

}
