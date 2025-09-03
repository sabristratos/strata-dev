<?php

declare(strict_types=1);

namespace Strata\UI\ValueObjects;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

class SingleDate implements Arrayable
{
    public function __construct(
        public Carbon $date
    ) {}

    public static function fromString(string $dateString): self
    {
        return new self(Carbon::parse($dateString));
    }

    public static function fromCarbon(Carbon $date): self
    {
        return new self($date);
    }

    public static function today(): self
    {
        return new self(Carbon::today());
    }

    public static function now(): self
    {
        return new self(Carbon::now());
    }

    public function toArray(): array
    {
        return [
            'date' => $this->date->toDateString(),
        ];
    }

    public function toDateString(): string
    {
        return $this->date->toDateString();
    }

    public function format(string $format = 'Y-m-d'): string
    {
        return $this->date->format($format);
    }

    public function isToday(): bool
    {
        return $this->date->isToday();
    }

    public function isPast(): bool
    {
        return $this->date->isPast();
    }

    public function isFuture(): bool
    {
        return $this->date->isFuture();
    }

    public function diffForHumans(): string
    {
        return $this->date->diffForHumans();
    }

    public function __toString(): string
    {
        return $this->toDateString();
    }
}
