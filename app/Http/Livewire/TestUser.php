<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TestUser extends Component
{
    public $open = false;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.test-user');
    }
}
