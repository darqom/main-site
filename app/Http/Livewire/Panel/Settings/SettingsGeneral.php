<?php

namespace App\Http\Livewire\Panel\Settings;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class SettingsGeneral extends Component
{
    use WithFileUploads;

    public $option;

    protected $rules = [
        'option.site-logo' => 'sometimes|file|image|mimes:jpg,png,gif',
        'option.site-footer-logo' => 'sometimes|file|image|mimes:jpg,png,gif'
    ];

    public function mount()
    {
        $this->option = option([
            'site-title', 'site-banner', 'site-logo', 'site-footer-logo'
        ]);
    }

    public function updated()
    {
        $this->handleFileUpload();

        option()->put($this->option);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.panel.settings.general')
            ->layout('layouts.panel', [
                'title' => 'Pengaturan'
            ]);
    }

    private function handleFileUpload()
    {
        $banner = $this->option['site-banner'];
        $logo = $this->option['site-logo'];
        $footer = $this->option['site-footer-logo'];

        if(!is_string($banner) && !is_null($banner)) {
            $this->validate(['option.site-banner' => 'file|image|mimes:jpg,png']);
            $this->option['site-banner'] = $this->storeFile($banner, 'banner');
        }

        if(!is_string($logo) && !is_null($logo)) {
            $this->validate(['option.site-logo' => 'file|image|mimes:jpg,png']);
            $this->option['site-logo'] = $this->storeFile($logo, 'logo');
        }

        if(!is_string($footer) && !is_null($footer)) {
            $this->validate(['option.site-footer-logo' => 'file|image|mimes:jpg,png']);
            $this->option['site-footer-logo'] = $this->storeFile($footer, 'footer-logo');
        }
    }

    private function storeFile(TemporaryUploadedFile $file, string $name)
    {
        $ext = $file->getClientOriginalExtension();
        $img = option("site-{$name}");
        $name = $name . time() . $ext;

        Storage::disk('assets')->delete("img/{$img}");
        $file->storeAs('img', $name, ['disk' => 'assets']);
        return $name;
    }
}
