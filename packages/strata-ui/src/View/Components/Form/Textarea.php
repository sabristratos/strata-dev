<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Textarea component for multi-line text input.
 */
class Textarea extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public int $rows = 3,
        public bool $autoResize = false,
        public ?string $placeholder = null,
        public mixed $value = null,
        public bool $required = false,
        public bool $disabled = false,
        public bool $readonly = false
    ) {
        // Auto-generate ID if not provided
        if (! $this->id && $this->name) {
            $this->id = $this->name.'_'.uniqid();
        } elseif (! $this->id) {
            $this->id = 'textarea_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.textarea');
    }

    /**
     * Get textarea classes based on state and configuration
     */
    public function getTextareaClasses(): string
    {
        $classes = ['input-base', 'min-h-20'];

        // Add error state styling using theme tokens
        if ($this->error) {
            $classes[] = 'border-destructive';
            $classes[] = 'focus-visible:ring-destructive';
        }

        // Handle resize behavior
        if ($this->autoResize) {
            $classes[] = 'resize-none';
            $classes[] = 'overflow-hidden';
        } else {
            $classes[] = 'resize-y';
        }

        return implode(' ', $classes);
    }
}
