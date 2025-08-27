<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Form error message component with accessibility features.
 */
class Error extends Component
{
    public function __construct(
        public ?string $message = null,
        public ?string $field = null,
        public ?string $id = null,
        public string $size = 'sm'
    ) {
        // Auto-generate ID if not provided
        if (! $this->id && $this->field) {
            $this->id = $this->field.'-error';
        } elseif (! $this->id) {
            $this->id = 'error_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.error');
    }

    /**
     * Get error classes based on size
     */
    public function getErrorClasses(): string
    {
        $classes = [
            'mt-2',
            'text-destructive',
            'flex',
            'items-start',
            'gap-2',
        ];

        // Add size-specific classes
        $classes[] = match ($this->size) {
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-base',
            default => 'text-sm'
        };

        return implode(' ', $classes);
    }

    /**
     * Check if we should render the error
     */
    public function shouldRender(): bool
    {
        return ! empty($this->message);
    }
}
