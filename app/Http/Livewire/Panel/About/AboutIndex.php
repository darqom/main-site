<?php

namespace App\Http\Livewire\Panel\About;

use Livewire\Component;

class AboutIndex extends Component
{
    public $about;

    public function mount()
    {
        $this->about = option([
            'school-info', 'school-video', 'school-phone', 'school-mail', 'school-address',
            'social-facebook', 'social-youtube', 'social-instagram',
            'social-facebook-id', 'social-youtube-id', 'social-instagram-id'
        ]);
    }

    public function updated()
    {
        option()->put($this->about);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.panel.about.index')
            ->layout('layouts.panel', [
                'title' => 'Tentang Sekolah'
            ]);
    }
}
