<?php

namespace App\Http\Livewire;

use App\Models\Request;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRequests extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $requests=Request::where('folio', 'LIKE', '%' . $this->search . '%')->orWhere('name', 'LIKE', '%' . $this->search . '%')->paginate(12);
        $areas = Area::all();
        $folio = Request::getFolioForRequest();

        return view('livewire.show-requests', compact('requests','areas', 'folio'));
    }
}
