<?php

namespace App\Http\Livewire\Panel\Settings;

use Livewire\Component;

class SettingsIndex extends Component
{
    public function render()
    {
        return view('livewire.panel.settings.index')
            ->layout('layouts.panel', [
                'title' => 'Pengaturan'
            ]);
    }
}
