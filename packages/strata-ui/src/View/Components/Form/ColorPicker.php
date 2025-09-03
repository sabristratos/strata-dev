<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

/**
 * Color picker component for form fields with multiple color space support.
 */
class ColorPicker extends Component
{
    public function __construct(
        public ?string $label = null,
        public ?string $value = null,
        public ?string $defaultColor = '#6366f1',
        public ?string $placeholder = 'Select color',
        public ?string $name = null,
        public ?string $id = null,
        public ?string $error = null,
        public ?string $description = null,
        public ?string $helpText = null, // Keep for backward compatibility
        public bool $disabled = false,
        public bool $required = false,
        public bool $clearable = false,
        public bool $showAlpha = false,
        public bool $allowCustom = true,
        public bool $brandColors = true,
        public string $format = 'hex',
        public float $alpha = 1.0,
        public string $variant = 'default',
    ) {

        if (! $this->description && $this->helpText) {
            $this->description = $this->helpText;
        }


        $this->validateConfiguration();


        if (! $this->id && $this->name) {
            $this->id = $this->name.'_'.uniqid();
        } elseif (! $this->id) {
            $this->id = 'color_picker_'.uniqid();
        }
    }

    /**
     * Validate and auto-correct invalid configuration combinations.
     */
    private function validateConfiguration(): void
    {
        $alphaFormats = ['rgba', 'hsla'];
        $nonAlphaFormats = ['hex', 'hsl', 'rgb'];
        $originalFormat = $this->format;
        $originalShowAlpha = $this->showAlpha;


        if (in_array($this->format, $alphaFormats) && ! $this->showAlpha) {
            $this->showAlpha = true;
            if (app()->environment(['local', 'development'])) {
                Log::warning("Color picker '{$this->name}': Auto-enabled alpha control for {$this->format} format", [
                    'component' => 'ColorPicker',
                    'name' => $this->name,
                    'original_showAlpha' => $originalShowAlpha,
                    'corrected_showAlpha' => $this->showAlpha,
                ]);
            }
        }


        if ($this->showAlpha && in_array($this->format, $nonAlphaFormats)) {
            $this->format = 'rgba';
            if (app()->environment(['local', 'development'])) {
                Log::warning("Color picker '{$this->name}': Auto-switched to RGBA format for alpha support", [
                    'component' => 'ColorPicker',
                    'name' => $this->name,
                    'original_format' => $originalFormat,
                    'corrected_format' => $this->format,
                ]);
            }
        }


        if ($this->defaultColor) {
            $this->validateDefaultColor();
        }
    }

    /**
     * Validate and potentially adjust the default color format.
     */
    private function validateDefaultColor(): void
    {
        if (! $this->defaultColor) {
            return;
        }

        $isRgbaColor = str_contains($this->defaultColor, 'rgba');
        $isHslaColor = str_contains($this->defaultColor, 'hsla');
        $hasAlphaInColor = $isRgbaColor || $isHslaColor;


        if ($hasAlphaInColor && ! in_array($this->format, ['rgba', 'hsla'])) {
            if (app()->environment(['local', 'development'])) {
                Log::warning("Color picker '{$this->name}': Default color has alpha but format doesn't support it", [
                    'component' => 'ColorPicker',
                    'name' => $this->name,
                    'defaultColor' => $this->defaultColor,
                    'format' => $this->format,
                    'suggestion' => 'Consider using format="rgba" or format="hsla"',
                ]);
            }
        }


        if (! $hasAlphaInColor && $this->showAlpha && $this->format === 'rgba') {
            if (app()->environment(['local', 'development'])) {
                Log::info("Color picker '{$this->name}': Consider using RGBA color for consistency with alpha controls", [
                    'component' => 'ColorPicker',
                    'name' => $this->name,
                    'current_defaultColor' => $this->defaultColor,
                    'suggestion' => 'Use rgba(r, g, b, a) format for defaultColor',
                ]);
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.color-picker');
    }

    /**
     * Get variant-specific CSS classes for the component.
     */
    public function getVariantClasses(): string
    {
        $baseClasses = 'w-full px-3 py-2 text-sm bg-background border border-input button-radius focus:outline-hidden focus:ring-2 focus:ring-ring focus:border-ring disabled:cursor-not-allowed disabled:opacity-50 transition-colors duration-200';

        return match ($this->variant) {
            'minimal' => 'border-0 bg-transparent focus:bg-background hover:bg-accent/50',
            'outline' => $baseClasses,
            'ghost' => 'border-0 bg-transparent hover:bg-accent hover:text-accent-foreground',
            default => $baseClasses,
        };
    }
}
