<?php

namespace App\Http\Livewire\Panel\Post;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public $keyword = '';

    public function render()
    {
        return view('livewire.panel.post.index', [
            'posts' => Post::latest()
        ])->layout('layouts.panel', [
            'title' => 'Semua Post'
        ]);
    }
}
