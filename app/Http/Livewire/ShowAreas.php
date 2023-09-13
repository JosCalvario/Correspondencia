<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAreas extends Component
{
    use WithPagination;
    use Search;

    public function __construct(){

        $this->model = Area::class;
        $this->options = [
            'abbr' => 'Abreviatura',
            'name' => 'Nombre'
        ];
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $areas = $this->search();
        $options = $this->options;
        $units = Unit::all();
        $users = User::doesntHave('area')->get();

        return view('livewire.show-areas', compact('areas', 'options', 'units', 'users'));
    }

}
