<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Form label component with accessibility features.
 */
class Label extends Component
{
    public function __construct(
        public ?string $for = null,
        public bool $required = false,
        public ?string $id = null,
        public string $size = 'sm'
    ) {

        if (! $this->id && $this->for) {
            $this->id = $this->for.'-label';
        } elseif (! $this->id) {
            $this->id = 'label_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.label');
    }

    /**
     * Get label classes based on size
     */
    public function getLabelClasses(): string
    {
        $classes = [
            'block',
            'font-medium',
            'text-foreground',
            'mb-2',
        ];


        $classes[] = match ($this->size) {
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-base',
            'lg' => 'text-lg',
            default => 'text-sm'
        };

        return implode(' ', $classes);
    }
}
