<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $roles = [];
    public $user;
    public $role;

    protected $listeners = [
        'userCreated'
    ];

    protected $rules = [
        'user.name' => 'required|string|min:4',
        'user.username' => 'required|string|unique:users,username',
        'user.email' => 'required|email|unique:users,email',
        'user.password' => 'required|string|min:6',
        'user.password_confirm' => 'required|same:user.password',
        'role' => 'required|string|exists:roles,name',
    ];

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.panel.user.create')
            ->layout('layouts.panel', ['title' => 'Tambah User']);
    }

    public function store()
    {
        $this->validate();
        $this->manageProps();

        $user = User::create($this->user);
        $user->assignRole($this->role);

        $this->emit('userCreated');
    }

    public function userCreated()
    {
        $this->reset(['user', 'role']);
        $this->emit('swals', 'Berhasil menambahkan user');
    }

    private function manageProps()
    {
        $this->user['photo'] = 'nophoto.png';
        $this->user['password'] = Hash::make($this->user['password']);
        unset($this->user['password_confirm']);
    }
}
