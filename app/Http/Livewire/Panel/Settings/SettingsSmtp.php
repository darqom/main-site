<?php

namespace App\Http\Livewire\Panel\Settings;

use Livewire\Component;

class SettingsSmtp extends Component
{
    public $option;

    public function mount()
    {
        $this->option = option([
            'smtp-host', 'smtp-port', 'smtp-username', 'smtp-password', 'smtp-name'
        ]);
    }

    public function updated()
    {
        option()->put($this->option);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.panel.settings.smtp')
            ->layout('layouts.panel', [
                'title' => 'Pengaturan'
            ]);
    }
}
