<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tabs component for organizing content into switchable panels.
 */
class Tabs extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $defaultValue  Initially active tab
     * @param  string  $orientation  Tab orientation (horizontal, vertical)
     * @param  string  $activationMode  Activation mode (automatic, manual)
     * @param  string  $variant  Tab visual variant (default, pills, underline)
     * @param  bool  $disabled  Whether the entire tabs component is disabled
     */
    public function __construct(
        public ?string $defaultValue = null,
        public string $orientation = 'horizontal',
        public string $activationMode = 'automatic',
        public string $variant = 'default',
        public bool $disabled = false
    ) {
        $this->validateAndNormalizeConfiguration();
    }

    /**
     * Validate and normalize component configuration.
     */
    private function validateAndNormalizeConfiguration(): void
    {

        if (!in_array($this->orientation, ['horizontal', 'vertical'])) {
            $this->orientation = 'horizontal';
        }


        if (!in_array($this->activationMode, ['automatic', 'manual'])) {
            $this->activationMode = 'automatic';
        }


        if (!in_array($this->variant, ['default', 'pills', 'underline'])) {
            $this->variant = 'default';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.tabs', [
            'tabsId' => $this->getTabsId(),
        ]);
    }

    /**
     * Get the CSS classes for the tabs orientation.
     */
    public function getOrientationClasses(): string
    {
        return match ($this->orientation) {
            'vertical' => 'flex-row',
            default => 'flex-col',
        };
    }

    /**
     * Get the CSS classes for the tabs variant.
     */
    public function getVariantClasses(): string
    {
        return match ($this->variant) {
            'pills' => 'tabs-pills',
            'underline' => 'tabs-underline',
            default => 'tabs-default',
        };
    }

    /**
     * Get the CSS classes for the tabs container.
     */
    public function getContainerClasses(): string
    {
        $classes = [
            'tabs',
            $this->getOrientationClasses(),
            $this->getVariantClasses(),
            $this->disabled ? 'pointer-events-none opacity-50' : '',
        ];

        return implode(' ', array_filter($classes));
    }

    /**
     * Get tabs configuration for JavaScript.
     */
    public function getTabsConfig(): array
    {
        return [
            'id' => $this->getTabsId(),
            'defaultValue' => $this->defaultValue,
            'orientation' => $this->orientation,
            'activationMode' => $this->activationMode,
            'variant' => $this->variant,
            'disabled' => $this->disabled,
        ];
    }

    /**
     * Generate unique tabs ID.
     */
    public function getTabsId(): string
    {
        if (!isset($this->tabsId)) {
            $this->tabsId = 'strata-tabs-'.uniqid();
        }
        return $this->tabsId;
    }

    protected ?string $tabsId = null;
}
