<?php

declare(strict_types=1);

namespace Strata\UI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Text component for Strata UI.
 *
 * A flexible text component for global control of website typography.
 * Supports multiple variants, sizes, weights, and semantic HTML elements.
 */
class Text extends Component
{
    public function __construct(
        public string $variant = 'body',
        public string $size = 'base',
        public string $weight = 'normal',
        public string $color = 'foreground',
        public ?string $as = null,
    ) {}

    public function render(): View
    {
        return view('strata::components.text');
    }
}
