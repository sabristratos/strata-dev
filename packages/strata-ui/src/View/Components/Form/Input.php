<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Input component for form fields.
 */
class Input extends Component
{
    public function __construct(
        public string $type = 'text',
        public ?string $name = null,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $icon = null,
        public bool $clearable = false,
        public bool $showPasswordToggle = false,
        public ?string $placeholder = null,
        public mixed $value = null,
        public bool $required = false,
        public bool $disabled = false,
        public bool $readonly = false
    ) {
        if ($this->type === 'password' && ! $this->showPasswordToggle) {
            $this->showPasswordToggle = true;
        }

        // Auto-generate ID if not provided
        if (! $this->id && $this->name) {
            $this->id = $this->name.'_'.uniqid();
        } elseif (! $this->id) {
            $this->id = 'input_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.input');
    }

    /**
     * Get wrapper classes for the flex container that provides visual styling
     */
    public function getWrapperClasses(): string
    {
        $classes = ['input-base', 'h-9', 'items-center'];

        // Add error state styling using theme tokens
        if ($this->error) {
            $classes[] = 'border-destructive';
            $classes[] = 'focus-within:ring-destructive';
        }

        return implode(' ', $classes);
    }

    /**
     * Get input element classes for the invisible/transparent input
     */
    public function getInputClasses(): string
    {
        $classes = ['input-element'];

        return implode(' ', $classes);
    }
}
