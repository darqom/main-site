<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\UserHasRole;

trait HasRole
{
    public function getRole()
    {
        return $this->get()->role->name ?? null;
    }

    public function hasRole(string $name)
    {
        return ($this->getRole() == $name) ? true : false;
    }

    public function assignRole(string $name)
    {
        $hasRole = $this->get();
        $role = $this->role($name);

        if ($hasRole && $role) {
            $hasRole->update([
                'role_id' => $role->id
            ]);
        } else if (!$hasRole && $role) {
            UserHasRole::create([
                'user_id' => $this->getModel()->id,
                'role_id' => $role->id
            ]);
        } else {
            return false;
        }

        return $this;
    }

    public function resetRole()
    {
        $this->get()->delete();
        return $this;
    }

    private function get()
    {
        return UserHasRole::where('user_id', $this->getModel()->id)->first();
    }

    private function role(String $name)
    {
        return Role::where('name', $name)->first();
    }
}
