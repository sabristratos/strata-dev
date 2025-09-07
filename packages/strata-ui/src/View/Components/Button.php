<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Button component for Strata UI.
 */
class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string  $variant  The button variant (primary, brand, action, accent, destructive, success, warning, info, outline, secondary, ghost)
     * @param  string  $size  The button size (sm, md, lg)
     * @param  string  $type  The button type attribute
     * @param  bool  $disabled  Whether the button is disabled
     * @param  bool  $loading  Whether the button is in loading state
     * @param  string|null  $icon  The icon name to display
     * @param  string  $iconPosition  The position of the icon (left, right)
     */
    public function __construct(
        public string $variant = 'primary',
        public string $size = 'md',
        public string $type = 'button',
        public bool $disabled = false,
        public bool $loading = false,
        public ?string $icon = null,
        public string $iconPosition = 'left',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.button');
    }

    /**
     * Get the CSS classes for the button variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'brand' => 'bg-brand-500 text-white hover:bg-brand-600 focus-visible:ring-brand-500 shadow',
            'action' => 'bg-action-500 text-white hover:bg-action-600 focus-visible:ring-action-500 shadow',
            'accent' => 'bg-accent text-accent-foreground hover:bg-accent/90 focus-visible:ring-accent shadow',
            'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90 focus-visible:ring-destructive shadow',
            'success' => 'bg-success-500 text-white hover:bg-success-600 focus-visible:ring-success-500 shadow',
            'warning' => 'bg-warning-500 text-warning-foreground hover:bg-warning-600 focus-visible:ring-warning-500 shadow',
            'info' => 'bg-info-500 text-white hover:bg-info-600 focus-visible:ring-info-500 shadow',
            'outline' => 'border border-border bg-background text-foreground hover:bg-neutral-100 hover:text-foreground focus-visible:ring-border shadow-sm',
            'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/90 focus-visible:ring-secondary shadow-sm',
            'ghost' => 'text-foreground hover:bg-neutral-100 hover:text-foreground focus-visible:ring-neutral-300',
            default => 'bg-primary text-primary-foreground hover:bg-primary/90 focus-visible:ring-primary shadow',
        };
    }
}
