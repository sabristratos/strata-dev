<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Strata\UI\ValueObjects\DateRange;
use Strata\UI\ValueObjects\SingleDate;

#[Layout('components.layouts.app')]
class Demo extends Component
{
    // Datepicker properties - restored for testing
    public ?SingleDate $birth_date = null;

    public ?DateRange $event_dates = null;

    public function mount()
    {
        // Initialize with some example values (optional - could also start null)
        // $this->birth_date = SingleDate::fromString('1990-01-01');
        // $this->event_dates = new DateRange(
        //     Carbon::now()->addDays(7),
        //     Carbon::now()->addDays(14)
        // );
    }

    public function showToast($type)
    {
        $toastMessages = [
            'success' => [
                'variant' => 'success',
                'title' => 'Success!',
                'message' => 'Your action was completed successfully.',
            ],
            'error' => [
                'variant' => 'destructive',
                'title' => 'Error',
                'message' => 'Something went wrong. Please try again.',
            ],
            'warning' => [
                'variant' => 'warning',
                'title' => 'Warning',
                'message' => 'Please review this important information.',
            ],
            'info' => [
                'variant' => 'info',
                'title' => 'Information',
                'message' => 'Here is some useful information for you.',
            ],
        ];

        $toast = $toastMessages[$type] ?? $toastMessages['info'];

        $this->js("window.dispatchEvent(new CustomEvent('strata-toast-show', { detail: ".json_encode($toast).' }));');
    }

    public function render()
    {
        return view('livewire.demo');
    }
}
