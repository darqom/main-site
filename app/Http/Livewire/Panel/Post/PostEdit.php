<?php

namespace App\Http\Livewire\Panel\Post;

use Livewire\Component;

class PostEdit extends Component
{
    public function render()
    {
        return view('livewire.panel.post.edit')
            ->layout('layouts.panel');
    }
}
