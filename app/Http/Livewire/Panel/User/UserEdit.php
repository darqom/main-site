<?php

namespace App\Http\Livewire\Panel\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserEdit extends Component
{
    public $user;
    public $role;
    public $roles = [];
    public User $model;

    protected $listeners = [
        'userUpdated'
    ];

    public function mount($id)
    {
        $this->model = User::findOrFail($id);

        $this->user = $this->model->toArray();
        $this->role = $this->model->getRole();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.panel.user.edit')
            ->layout('layouts.panel', ['title' => 'Edit User']);
    }

    public function update()
    {
        $this->validate([
            'user.name' => 'required|string|min:4',
            'role' => 'required|string|exists:roles,name',
        ]);

        $this->checkUpdate();
        $this->updatePassword();

        $this->model->update($this->user);
        $this->model->assignRole($this->role);

        $this->emit('userUpdated');
    }

    public function userUpdated()
    {
        unset($this->user['password']);
        unset($this->user['password_confirm']);

        $this->emit('swals', 'Berhasil mengedit data user');
    }

    /**
     * Check Update
     * ----------------------------------->
     * Mengaktifkan validasi apabila username, email, dan password
     * dari user dirubah nilainya
     */
    private function checkUpdate(): void
    {
        $rules = [];

        if($this->user['username'] != $this->model->username) {
            $rules['user.username'] = 'required|string|unique:users,username';
        }

        if($this->user['email'] != $this->model->email) {
            $rules['user.email'] = 'required|email|unique:users,email';
        }

        if(isset($this->user['password'])) {
            $rules ['user.password'] = 'required|string|min:6';
            $rules ['user.password_confirm'] = 'required|same:user.password';
        }

        if(!empty($rules)) $this->validate($rules);
    }

    /**
     * Update Password
     * ----------------------------------->
     * Merubah default nilai password dari untuk dimasukkan ke database
     */
    private function updatePassword(): void
    {
        if(isset($this->user['password'])){
            $this->user['password'] = Hash::make($this->user['password']);
        }
    }
}
