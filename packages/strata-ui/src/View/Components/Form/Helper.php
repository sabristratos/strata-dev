<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Form helper text component with accessibility features.
 */
class Helper extends Component
{
    public function __construct(
        public ?string $text = null,
        public ?string $field = null,
        public ?string $id = null,
        public string $size = 'xs',
        public bool $showIcon = false
    ) {

        if (! $this->id && $this->field) {
            $this->id = $this->field.'-description';
        } elseif (! $this->id) {
            $this->id = 'helper_'.uniqid();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.helper');
    }

    /**
     * Get helper classes based on size
     */
    public function getHelperClasses(): string
    {
        $classes = [
            'text-muted-foreground',
            'mb-2',
        ];

        if ($this->showIcon) {
            $classes[] = 'flex';
            $classes[] = 'items-start';
            $classes[] = 'gap-2';
        }


        $classes[] = match ($this->size) {
            'xs' => 'text-xs',
            'sm' => 'text-sm',
            'md' => 'text-base',
            default => 'text-xs'
        };

        return implode(' ', $classes);
    }

    /**
     * Check if we should render the helper
     */
    public function shouldRender(): bool
    {
        return ! empty($this->text);
    }
}
