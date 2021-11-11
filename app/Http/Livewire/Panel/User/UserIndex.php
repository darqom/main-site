<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $paginate = 5;
    public $keyword = '';

    public function render()
    {
        return view('livewire.panel.user.index', [
            'users' => $this->getUsers()
        ])->layout('layouts.panel', [
            'title' => 'List Users'
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->emit('swals', 'Berhasil menghapus data user');
    }

    private function getUsers()
    {
        $user = (strlen($this->keyword) > 0) ?
            User::latest()->where('name', 'like', "%{$this->keyword}%") :
            User::latest();

        return $user->paginate($this->paginate);
    }
}
