<?php

namespace App\Http\Livewire\Panel\About;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutIndex extends Component
{
    use WithFileUploads;

    public $about;

    public function mount()
    {
        $this->about = option([
            'school-info', 'school-video', 'school-phone', 'school-mail', 'school-address',
            'social-facebook', 'social-youtube', 'social-instagram',
            'social-facebook-id', 'social-youtube-id', 'social-instagram-id',
            'school-video-cover'
        ]);
    }

    public function updated()
    {
        $this->handleCover();

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

    private function handleCover()
    {
        $cover = $this->about['school-video-cover'];

        if(!is_string($cover) && !is_null($cover)) {
            $this->validate(['about.school-video-cover' => 'file|image|mimes:jpg,png']);
            
            $oldCover = option('school-video-cover');
            $newCover = 'cover' . time() . $cover->getClientOriginalExtension();

            Storage::disk('assets')->delete("img/$oldCover");
            $cover->storeAs('img', $newCover, ['disk' => 'assets']);
            $this->about['school-video-cover'] = $newCover;
        }
    }
}
