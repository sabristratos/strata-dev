<?php

declare(strict_types=1);

namespace Strata\UI\Synthesizers;

use Carbon\Carbon;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Strata\UI\ValueObjects\SingleDate;

class SingleDateSynth extends Synth
{
    public static string $key = 'ssd';

    public static function match($target): bool
    {
        return $target instanceof SingleDate;
    }

    public function dehydrate(SingleDate $target): array
    {
        return [$target->toDateString(), []];
    }

    public function hydrate($value): ?SingleDate
    {
        if ($value === null || $value === '' || $value === 'null') {
            return null;
        }

        if ($value instanceof SingleDate) {
            return $value;
        }

        if (is_string($value)) {
            try {
                return SingleDate::fromString($value);
            } catch (\Exception $e) {
                return null;
            }
        }

        return null;
    }

    public function set(&$target, $key, $value): void
    {
        if ($key === 'date') {
            $target = new SingleDate(Carbon::parse($value));
        }
    }

    public function get(&$target, $key)
    {
        return match ($key) {
            'date' => $target->date->toDateString(),
            default => null,
        };
    }
}
