<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Accordion component for collapsible content panels.
 */
class Accordion extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $variant  The accordion variant (default, bordered, flush, filled)
     * @param  string  $size  The accordion size (sm, md, lg)
     * @param  string  $type  The accordion behavior (single, multiple)
     * @param  string|array|null  $defaultValue  Initially opened item(s)
     * @param  bool  $animated  Whether to animate expand/collapse
     * @param  string  $iconPosition  Position of the toggle icon (start, end)
     * @param  bool  $disabled  Whether the entire accordion is disabled
     */
    public function __construct(
        public string $variant = 'default',
        public string $size = 'md',
        public string $type = 'single',
        public string|array|null $defaultValue = null,
        public bool $animated = true,
        public string $iconPosition = 'end',
        public bool $disabled = false,
    ) {
        $this->validateAndNormalizeConfiguration();
    }

    /**
     * Validate and normalize component configuration.
     */
    private function validateAndNormalizeConfiguration(): void
    {

        if (! in_array($this->type, ['single', 'multiple'])) {
            $this->type = 'single';
        }


        if (! in_array($this->variant, ['default', 'bordered', 'flush', 'filled'])) {
            $this->variant = 'default';
        }


        if (! in_array($this->size, ['sm', 'md', 'lg'])) {
            $this->size = 'md';
        }


        if (! in_array($this->iconPosition, ['start', 'end'])) {
            $this->iconPosition = 'end';
        }


        if ($this->type === 'single' && is_array($this->defaultValue)) {
            $this->defaultValue = reset($this->defaultValue) ?: null;
        } elseif ($this->type === 'multiple' && is_string($this->defaultValue)) {
            $this->defaultValue = [$this->defaultValue];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.accordion', [
            'accordionId' => $this->getAccordionId(),
        ]);
    }

    /**
     * Get the CSS classes for the accordion variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'bordered' => 'border border-border rounded-lg overflow-hidden',
            'flush' => '',
            'filled' => 'bg-muted/50 rounded-lg overflow-hidden',
            default => 'space-y-2',
        };
    }

    /**
     * Get the CSS classes for the accordion size.
     */
    public function getSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'text-sm',
            'lg' => 'text-lg',
            default => 'text-base',
        };
    }

    /**
     * Get the CSS classes for the accordion container.
     */
    public function getContainerClasses(): string
    {
        $classes = [
            'accordion',
            $this->getVariantClasses(),
            $this->getSizeClasses(),
            $this->disabled ? 'pointer-events-none opacity-50' : '',
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get accordion configuration for JavaScript.
     */
    public function getAccordionConfig(): array
    {
        return [
            'id' => $this->getAccordionId(),
            'type' => $this->type,
            'defaultValue' => $this->defaultValue,
            'animated' => $this->animated,
            'variant' => $this->variant,
            'size' => $this->size,
            'iconPosition' => $this->iconPosition,
            'disabled' => $this->disabled,
        ];
    }

    /**
     * Generate unique accordion ID.
     */
    public function getAccordionId(): string
    {
        if (!isset($this->accordionId)) {
            $this->accordionId = 'strata-accordion-'.uniqid();
        }
        return $this->accordionId;
    }

    protected ?string $accordionId = null;

}
