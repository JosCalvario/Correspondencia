<?php

namespace App\Http\Livewire;

use App\Models\Request;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ShowRoles extends Component
{
    use WithPagination;
    use Search;

    public function __construct(){

        $this->model = Role::class;
        $this->options = [
            'id' => 'Id',
            'name' => 'Nombre'
        ];
        $this->pagination = false;
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $roles = $this->search();
        $permissions = Permission::all();
        $options = $this->options;

        return view('livewire.show-roles', compact('roles', 'permissions', 'options'));
    }

}
