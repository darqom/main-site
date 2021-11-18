<?php

namespace App\Http\Livewire\Panel\Post;

use App\Models\Post;
use App\Services\Post\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public $post;

    protected $rules = [
        'post.title' => 'required|string|min:3',
        'post.content' => 'required|string|min:5',
        'post.status' => 'required|in:publish,draft',
        'post.comment' => 'required|in:deny,allow',
    ];

    public function mount($id)
    {
        $this->model = Post::findOrFail($id);
        $this->post = $this->model->toArray();
    }

    public function updated()
    {
        if(!is_string($this->post['cover'])) {
            $this->validate([
                'post.cover' => 'sometimes|file|image|mimes:jpg,png,gif'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.panel.post.edit')
            ->layout('layouts.panel', [
                'title' => 'Edit Post'
            ]);
    }

    public function update()
    {
        $this->validate();
        $this->manageProps();

        $this->model->update($this->post);
        $this->emit('swals', 'Post berhasil diubah');
    }

    private function manageProps(): void
    {
        if(!is_string($this->post['cover'])) {
            if($cover = $this->post['cover'] ?? false) {
                $this->post['cover'] = Image::changeCover($cover, $this->model->cover);
            } else {
                $this->post['cover'] = 'noimage.jpg';
            }
        }

        // Automatic assign uncategorized
        if(!isset($this->post['category_id'])) $this->post['category_id'] = 1;
    }
}
