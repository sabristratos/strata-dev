<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class SidebarDemo extends Component
{
    #[Layout('components.layouts.sidebar-layout-example')]
    public function render()
    {
        return view('livewire.sidebar-demo-simple');
    }
}
