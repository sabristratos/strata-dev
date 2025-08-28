<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class Demo extends Component
{
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
