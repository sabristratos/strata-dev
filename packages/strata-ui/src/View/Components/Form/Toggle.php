<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $error = null,
        public mixed $value = null,
        public bool $checked = false,
        public ?string $id = null
    ) {
        $this->id = $id ?: 'toggle-'.uniqid();
    }

    public function render(): View
    {
        return view('strata::components.form.toggle');
    }
}
