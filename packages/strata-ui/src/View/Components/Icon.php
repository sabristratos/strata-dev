<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Icon component for displaying SVG icons.
 */
class Icon extends Component
{
    public function __construct(
        public string $name,
        public ?string $library = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.icon');
    }

    /**
     * Get the component name for the icon
     */
    public function getIconComponent(): string
    {

        if ($this->library) {
            return $this->library.'::'.$this->name;
        }


        if (str_starts_with($this->name, 'heroicon-')) {
            return 'heroicon-'.str_replace('heroicon-', '', $this->name);
        }

        return $this->name;
    }
}
