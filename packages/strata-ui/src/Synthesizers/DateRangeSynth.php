<?php

declare(strict_types=1);

namespace Strata\UI\Synthesizers;

use Carbon\Carbon;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Strata\UI\ValueObjects\DateRange;

class DateRangeSynth extends Synth
{
    public static string $key = 'sdr';

    public static function match($target): bool
    {
        return $target instanceof DateRange;
    }

    public function dehydrate(DateRange $target): array
    {
        return [$target->toArray(), []];
    }

    public function hydrate($value): ?DateRange
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof DateRange) {
            return $value;
        }

        return DateRange::fromArray($value);
    }

    public function set(&$target, $key, $value): void
    {
        if ($key === 'start') {
            $target = new DateRange(
                Carbon::parse($value),
                $target->end
            );
        } elseif ($key === 'end') {
            $target = new DateRange(
                $target->start,
                Carbon::parse($value)
            );
        }
    }

    public function get(&$target, $key)
    {
        return match ($key) {
            'start' => $target->start->toDateString(),
            'end' => $target->end->toDateString(),
            default => null,
        };
    }
}
