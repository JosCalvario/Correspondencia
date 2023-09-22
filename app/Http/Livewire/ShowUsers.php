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
    use Search;

    public $open = true;
    
    public function __construct(){

        $this->model = User::class;
        $this->options = [
            'id' => 'Id',
            'name' => 'Nombre',
            'email' => 'Correo electrónico',
            'area_id' => 'Departamento'
        ];
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = $this->search();
        $roles = Role::all();
        $areas = Area::all();

        return view('livewire.show-users', compact('users','areas', 'roles'));
    }

}
