<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Strata\UI\Concerns\HasDatePresets;
use Strata\UI\ValueObjects\DateRange;
use Strata\UI\ValueObjects\SingleDate;

/**
 * Datepicker component for form fields.
 */
class Datepicker extends Component
{
    use HasDatePresets;

    public Carbon $initialDate;

    public ?Carbon $startDate;

    public ?Carbon $endDate;

    public array $presets;

    public string $locale;

    public function __construct(
        public mixed $value = null,
        public ?string $name = null,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public ?string $icon = 'heroicon-o-calendar-days',
        public ?string $placeholder = null,
        public bool $required = false,
        public bool $disabled = false,
        public bool $readonly = false,
        public bool $clearable = true,
        ?string $initialDate = null,
        ?string $startDate = null,
        ?string $endDate = null,
        public string $weekStart = 'sunday',
        public bool $range = false,
        public bool $multiple = false,
        public int $visibleMonths = 1,
        bool $presets = false,
        ?string $locale = null,
        public bool $selecting = false,
        public bool $updating = false,
        public ?string $minDate = null,
        public ?string $maxDate = null,
        public array $disabledDates = [],
        public bool $showClearButton = false,
        public bool $closeOnSelect = true,
        public string $format = 'M j, Y',
        public string $position = 'bottom-start',
        public int $offset = 8,
        public string $width = 'w-80'
    ) {

        if ($this->value instanceof DateRange) {
            $this->startDate = $this->value->start;
            $this->endDate = $this->value->end;
        } elseif ($this->value instanceof SingleDate) {

            $this->startDate = $this->value->date;
            $this->endDate = $this->range ? null : null;
        } elseif (is_array($this->value) && isset($this->value['start'])) {
            $this->startDate = Carbon::parse($this->value['start']);
            $this->endDate = Carbon::parse($this->value['end']);
        } elseif (is_string($this->value) && ! empty($this->value)) {

            $this->startDate = Carbon::parse($this->value);
            $this->endDate = $this->range ? null : null;
        }

        elseif ($startDate || $endDate) {
            $this->startDate = $startDate ? Carbon::parse($startDate) : null;
            $this->endDate = $endDate ? Carbon::parse($endDate) : null;
        } else {
            $this->startDate = null;
            $this->endDate = null;
        }

        $this->initialDate = Carbon::parse($initialDate ?? $this->startDate ?? 'now');
        $this->locale = $locale ?? App::getLocale();
        $this->presets = $presets ? $this->getTranslatedPresets() : [];


        if (! $this->id && $this->name) {
            $this->id = $this->name.'_'.uniqid();
        } elseif (! $this->id) {
            $this->id = 'datepicker_'.uniqid();
        }


        if (! $this->placeholder) {
            if ($this->range) {
                $this->placeholder = trans('strata::datepicker.select_date_range', [], $this->locale);
            } else {
                $this->placeholder = trans('strata::datepicker.select_date', [], $this->locale);
            }
        }


        if ($this->range && $this->visibleMonths === 1 && ! $multiple) {
            $this->visibleMonths = 2;
            $this->multiple = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.datepicker');
    }

    /**
     * Get wrapper classes for the trigger input
     */
    public function getWrapperClasses(): string
    {
        $classes = ['input-base', 'h-9', 'items-center', 'cursor-pointer'];


        if ($this->error) {
            $classes[] = 'border-destructive';
            $classes[] = 'focus-within:ring-destructive';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the display value for the input field
     */
    public function getDisplayValue(): string
    {
        if (! $this->startDate) {
            return '';
        }

        if ($this->range && $this->endDate) {
            return $this->startDate->format($this->format).' - '.$this->endDate->format($this->format);
        }

        return $this->startDate->format($this->format);
    }

    /**
     * Get the actual value for form submission and JavaScript initialization
     * Always returns serialized data that JavaScript can handle
     */
    public function getFormValue(): mixed
    {


        if ($this->range) {
            return [
                'start' => $this->startDate?->toDateString(),
                'end' => $this->endDate?->toDateString(),
            ];
        }

        return $this->startDate?->toDateString();
    }

    /**
     * Get day names for the calendar
     */
    public function getDayNames(): array
    {
        $days = trans('strata::calendar.days_short', [], $this->locale);
        if ($this->weekStart === 'monday') {
            $sunday = array_shift($days);
            $days[] = $sunday;
        }

        return $days;
    }
}
