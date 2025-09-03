<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Select component for form fields with dropdown functionality.
 */
class Select extends Component
{
    public function __construct(
        public ?string $label = null,
        public array $items = [],
        public mixed $selected = null,
        public ?string $placeholder = 'Choose...',
        public ?string $name = null,
        public ?string $id = null,
        public ?string $error = null,
        public ?string $description = null,
        public ?string $helpText = null, // Keep for backward compatibility
        public bool $disabled = false,
        public bool $required = false,
        public bool $clearable = false,
        public bool $multiple = false,
        public int $maxSelections = 0,
        public bool $searchable = false,
        public int $searchThreshold = 10,
        public string $searchPlaceholder = 'Search...',
        public string $variant = 'default',
    ) {

        if (! $this->description && $this->helpText) {
            $this->description = $this->helpText;
        }


        if (! $this->id && $this->name) {
            $this->id = $this->name.'_'.uniqid();
        } elseif (! $this->id) {
            $this->id = 'select_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.select');
    }

    /**
     * Get the CSS classes for the select variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'minimal' => 'select-minimal',
            default => 'input-base h-9',
        };
    }
}
