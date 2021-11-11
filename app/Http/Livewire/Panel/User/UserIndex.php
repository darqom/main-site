<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.panel.user.index', [
            'users' => User::latest()->paginate(10)
        ])->layout('layouts.panel', [
            'title' => 'List Users'
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->emit('swals', 'Berhasil menghapus data user');
    }
}
