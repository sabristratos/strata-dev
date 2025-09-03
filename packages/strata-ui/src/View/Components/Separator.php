<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Separator component for creating visual divisions between content sections.
 * Supports horizontal and vertical orientations with various styling options.
 */
class Separator extends Component
{
    public function __construct(
        public string $orientation = 'horizontal',
        public string $variant = 'default',
        public string $spacing = 'md',
        public ?string $label = null,
        public string $class = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.separator');
    }

    /**
     * Get the container classes for the separator.
     */
    public function getContainerClasses(): string
    {
        $classes = [];


        if ($this->orientation === 'vertical') {
            $classes[] = 'flex-col';
            $classes[] = 'items-center';
        } else {
            $classes[] = 'flex';
            $classes[] = 'items-center';
        }


        $classes[] = $this->getSpacingClasses();

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }

    /**
     * Get the separator line classes.
     */
    public function getSeparatorClasses(): string
    {
        $classes = [];


        if ($this->orientation === 'vertical') {
            $classes[] = 'w-px';
            $classes[] = 'h-full';
            $classes[] = 'min-h-4';
        } else {
            $classes[] = 'flex-1';
            $classes[] = 'h-px';
        }


        $classes[] = $this->getVariantClasses();

        return implode(' ', $classes);
    }

    /**
     * Get variant-specific classes.
     */
    protected function getVariantClasses(): string
    {
        return match ($this->variant) {
            'subtle' => 'bg-muted/20',
            'strong' => 'bg-border',
            'dashed' => 'bg-muted/30 border-dashed border-t border-0',
            default => 'bg-muted/30', // 'default'
        };
    }

    /**
     * Get spacing classes based on size.
     */
    protected function getSpacingClasses(): string
    {
        if ($this->orientation === 'vertical') {
            return match ($this->spacing) {
                'none' => '',
                'sm' => 'mx-2',
                'lg' => 'mx-6',
                'xl' => 'mx-8',
                default => 'mx-4', // 'md'
            };
        }

        return match ($this->spacing) {
            'none' => '',
            'sm' => 'my-2',
            'lg' => 'my-6',
            'xl' => 'my-8',
            default => 'my-4', // 'md'
        };
    }

    /**
     * Get label classes when label is present.
     */
    public function getLabelClasses(): string
    {
        $classes = [
            'text-xs',
            'font-medium',
            'text-muted-foreground',
            'uppercase',
            'tracking-wide',
            'whitespace-nowrap',
        ];

        if ($this->orientation === 'vertical') {
            $classes[] = 'px-2';
            $classes[] = 'py-1';
            $classes[] = 'writing-mode-vertical-rl';
            $classes[] = 'text-orientation-mixed';
        } else {
            $classes[] = 'px-3';
        }

        return implode(' ', $classes);
    }

    /**
     * Check if separator has a label.
     */
    public function hasLabel(): bool
    {
        return !empty($this->label);
    }

    /**
     * Get background classes for labeled separators.
     */
    public function getBackgroundClasses(): string
    {
        return 'bg-background';
    }

    /**
     * Get accessibility attributes.
     */
    public function getAccessibilityAttributes(): array
    {
        $attrs = [
            'role' => 'separator',
        ];

        if ($this->orientation === 'vertical') {
            $attrs['aria-orientation'] = 'vertical';
        }

        if ($this->hasLabel()) {
            $attrs['aria-label'] = $this->label;
        }

        return $attrs;
    }
}