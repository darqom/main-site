<?php

namespace App\Http\Livewire\Panel\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $keyword = '';
    public $paginate = 5;

    public function render()
    {
        return view('livewire.panel.post.index', [
            'posts' => $this->getPosts()
        ])->layout('layouts.panel', [
            'title' => 'Semua Post'
        ]);
    }

    public function getPosts()
    {
        $user = (strlen($this->keyword) > 0) ?
            Post::latest()->where('title', 'like', "%{$this->keyword}%") :
            Post::latest();

        return $user->paginate($this->paginate);
    }

    public function delete(int $id)
    {
        Post::find($id)->delete();
        
        $this->emit('swals', 'Berhasil menghapus post');
    }
}
