<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Rating component for Strata UI.
 */
class Rating extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $name  The input name attribute
     * @param  string|null  $label  The label text
     * @param  string|null  $description  The description text
     * @param  int|float|null  $value  The current rating value
     * @param  int  $max  The maximum rating value (number of stars)
     * @param  bool  $readonly  Whether the rating is readonly
     * @param  bool  $clearable  Whether to show a clear button
     * @param  string  $size  The size of the rating (sm, md, lg)
     * @param  string  $icon  The icon to use for rating items
     * @param  string|null  $id  The input ID attribute
     */
    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $description = null,
        public int|float|null $value = null,
        public int $max = 5,
        public bool $readonly = false,
        public bool $clearable = true,
        public string $size = 'md',
        public string $icon = 'heroicon-o-star',
        public string $color = 'yellow-500',
        public ?string $id = null,
    ) {
        $this->id = $id ?: 'rating-'.uniqid();

        $this->max = max(1, $this->max);

        if ($this->value !== null) {
            $this->value = max(0, min($this->max, $this->value));
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.rating');
    }

    /**
     * Get the CSS classes for the rating size.
     */
    public function getSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'w-4 h-4',
            'lg' => 'w-6 h-6',
            default => 'w-5 h-5',
        };
    }

    /**
     * Get the gap classes for the rating size.
     */
    public function getGapClasses(): string
    {
        return match ($this->size) {
            'sm' => 'gap-1',
            'lg' => 'gap-2',
            default => 'gap-1.5',
        };
    }

    /**
     * Get the clear button size classes.
     */
    public function getClearButtonSizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'w-4 h-4',
            'lg' => 'w-5 h-5',
            default => 'w-4 h-4',
        };
    }

    /**
     * Get the ID for the component.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the active color class for stars.
     */
    public function getActiveColorClass(): string
    {
        return match ($this->color) {
            'yellow-400' => 'text-yellow-400',
            'yellow-500' => 'text-yellow-500',
            'yellow-600' => 'text-yellow-600',
            'blue-400' => 'text-blue-400',
            'blue-500' => 'text-blue-500',
            'blue-600' => 'text-blue-600',
            'red-400' => 'text-red-400',
            'red-500' => 'text-red-500',
            'red-600' => 'text-red-600',
            'green-400' => 'text-green-400',
            'green-500' => 'text-green-500',
            'green-600' => 'text-green-600',
            'purple-400' => 'text-purple-400',
            'purple-500' => 'text-purple-500',
            'purple-600' => 'text-purple-600',
            'orange-400' => 'text-orange-400',
            'orange-500' => 'text-orange-500',
            'orange-600' => 'text-orange-600',
            'pink-400' => 'text-pink-400',
            'pink-500' => 'text-pink-500',
            'pink-600' => 'text-pink-600',
            'indigo-400' => 'text-indigo-400',
            'indigo-500' => 'text-indigo-500',
            'indigo-600' => 'text-indigo-600',
            default => 'text-yellow-500',
        };
    }

    /**
     * Get the hover color class for stars.
     */
    public function getHoverColorClass(): string
    {
        return match ($this->color) {
            'yellow-400' => 'hover:text-yellow-400',
            'yellow-500' => 'hover:text-yellow-500',
            'yellow-600' => 'hover:text-yellow-600',
            'blue-400' => 'hover:text-blue-400',
            'blue-500' => 'hover:text-blue-500',
            'blue-600' => 'hover:text-blue-600',
            'red-400' => 'hover:text-red-400',
            'red-500' => 'hover:text-red-500',
            'red-600' => 'hover:text-red-600',
            'green-400' => 'hover:text-green-400',
            'green-500' => 'hover:text-green-500',
            'green-600' => 'hover:text-green-600',
            'purple-400' => 'hover:text-purple-400',
            'purple-500' => 'hover:text-purple-500',
            'purple-600' => 'hover:text-purple-600',
            'orange-400' => 'hover:text-orange-400',
            'orange-500' => 'hover:text-orange-500',
            'orange-600' => 'hover:text-orange-600',
            'pink-400' => 'hover:text-pink-400',
            'pink-500' => 'hover:text-pink-500',
            'pink-600' => 'hover:text-pink-600',
            'indigo-400' => 'hover:text-indigo-400',
            'indigo-500' => 'hover:text-indigo-500',
            'indigo-600' => 'hover:text-indigo-600',
            default => 'hover:text-yellow-500',
        };
    }
}
