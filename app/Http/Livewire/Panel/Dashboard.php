<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.panel.dashboard')
            ->layout('layouts.panel', ['title' => 'Dashboard']);
    }
}
