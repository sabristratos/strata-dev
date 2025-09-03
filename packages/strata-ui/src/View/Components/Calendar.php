<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Strata\UI\Concerns\HasDatePresets;
use Strata\UI\ValueObjects\DateRange;

class Calendar extends Component
{
    use HasDatePresets;

    public Carbon $initialDate;

    public ?Carbon $startDate;

    public ?Carbon $endDate;

    public array $presets;

    public string $locale;

    public function __construct(
        public mixed $value = null,
        ?string $initialDate = null,
        ?string $startDate = null,
        ?string $endDate = null,
        public string $weekStart = 'sunday',
        public bool $range = true,
        public bool $multiple = true,
        public int $visibleMonths = 2,
        bool $presets = true,
        ?string $locale = null,
        public bool $selecting = false,
        public bool $updating = false,
        public ?string $minDate = null,
        public ?string $maxDate = null,
        public array $disabledDates = [],
        public bool $showClearButton = false,
        public bool $closeOnSelect = false
    ) {
        if ($this->value instanceof DateRange) {
            $this->startDate = $this->value->start;
            $this->endDate = $this->value->end;
        } elseif (is_array($this->value) && isset($this->value['start'])) {
            $this->startDate = Carbon::parse($this->value['start']);
            $this->endDate = Carbon::parse($this->value['end']);
        } elseif ($startDate || $endDate) {
            $this->startDate = $startDate ? Carbon::parse($startDate) : null;
            $this->endDate = $endDate ? Carbon::parse($endDate) : null;
        } else {
            $this->startDate = null;
            $this->endDate = null;
        }

        $this->initialDate = Carbon::parse($initialDate ?? $this->startDate ?? 'now');
        $this->locale = $locale ?? App::getLocale();
        $this->presets = $presets ? $this->getTranslatedPresets() : [];
    }

    public function render(): View
    {
        return view('strata::components.calendar');
    }

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
