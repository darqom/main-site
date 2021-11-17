<?php

namespace App\Http\Livewire\Panel\Post;

use App\Models\Post;
use App\Services\Post\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $post;

    protected $rules = [
        'post.title' => 'required|string|min:3',
        'post.content' => 'required|string|min:5',
        'post.status' => 'required|in:publish,draft',
        'post.comment' => 'required|in:deny,allow',
    ];

    protected $listeners = [
        'postCreated' => '$refresh'
    ];

    public function updated()
    {
        $this->validate([
            'post.cover' => 'sometimes|file|image|mimes:jpg,png,gif'
        ]);
    }

    public function render()
    {
        return view('livewire.panel.post.create')
            ->layout('layouts.panel', [
                'title' => 'Tambah Post'
            ]);
    }

    public function store()
    {
        $this->validate();
        $this->manageProps();

        Post::create($this->post);

        $this->reset('post');
        $this->emit('swals', 'Post berhasil disimpan');
        $this->emit('postCreated');
    }

    private function manageProps(): void
    {
        if($cover = $this->post['cover'] ?? false) {
            $this->post['cover'] = Image::uploadCover($cover);
        } else {
            $this->post['cover'] = 'noimage.jpg';
        }

        // Automatic assign uncategorized
        if(!isset($this->post['category_id'])) $this->post['category_id'] = 1;
    }
}
