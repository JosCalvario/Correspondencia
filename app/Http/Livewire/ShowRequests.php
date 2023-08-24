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
        $requests=Request::where('folio', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('document_type', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('sender', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('subject', 'LIKE', '%' . $this->search . '%')
                        ->orWhereIn('assigned_area', Area::select('id')->where('name', 'LIKE', '%' . $this->search . '%')->get())
                        ->paginate(12);
        $areas = Area::all();
        $folio = Request::getFolioForRequest();

        return view('livewire.show-requests', compact('requests','areas', 'folio'));
    }
}
