<?php

declare(strict_types=1);

namespace Strata\UI\Concerns;

use Carbon\Carbon;

trait HasDatePresets
{
    /**
     * Get translated date presets for calendar components
     */
    protected function getTranslatedPresets(): array
    {
        return [
            trans('strata::calendar.today', [], $this->locale) => [Carbon::today(), Carbon::today()],
            trans('strata::calendar.yesterday', [], $this->locale) => [Carbon::yesterday(), Carbon::yesterday()],
            trans('strata::calendar.this_week', [], $this->locale) => [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()],
            trans('strata::calendar.last_7_days', [], $this->locale) => [Carbon::now()->subDays(6), Carbon::now()],
            trans('strata::calendar.this_month', [], $this->locale) => [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()],
            trans('strata::calendar.last_30_days', [], $this->locale) => [Carbon::now()->subDays(29), Carbon::now()],
            trans('strata::calendar.last_month', [], $this->locale) => [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()],
        ];
    }
}
