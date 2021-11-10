<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.panel.user.index')
            ->layout('layouts.panel', ['title' => 'List Users']);
    }
}
