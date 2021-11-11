<?php

namespace App\Http\Livewire\Utils;

use Livewire\Component;

class Sweetalert extends Component
{
    protected $listeners = [
        'swals', 'swale'
    ];

    public function render()
    {
        return view('livewire.utils.sweetalert');
    }

    public function swals($message)
    {
        session()->flash('alert-success', $message);
    }

    public function swale($message)
    {
        session()->flash('alert-error', $message);
    }
}
