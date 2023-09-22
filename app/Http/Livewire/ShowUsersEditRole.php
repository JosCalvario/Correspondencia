<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ShowUsersEditRole extends Component
{
    public $open = false;
    public $user;
    public $roles;

    public function mount(User $user, Role $roles)
    {
        $this->user = $user;
        $this->roles = $roles;
    }

    public function render()
    {
        return view('livewire.show-users-edit-role');
    }
}
