<?php

namespace App\Http\Livewire;

use App\Models\Request;
use App\Models\Area;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        $areas = Area::all();

        return view('livewire.show-users', compact('users','areas', 'roles'));
    }
}