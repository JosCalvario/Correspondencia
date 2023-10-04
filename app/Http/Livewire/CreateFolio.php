<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Request;

class CreateFolio extends Component
{
    public $searchF;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {   
        $requests = Request::findWithoutResponseOrFolio($this->searchF);
        return view('livewire.create-folio', ['requests'=>$requests]);
    }
}
