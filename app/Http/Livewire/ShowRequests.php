<?php

namespace App\Http\Livewire;

use App\Models\Request;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRequests extends Component
{
    use WithPagination;

    public function render()
    {
        $requests=Request::paginate(12);
        $areas = Area::all();
        $folio = Request::getFolioForRequest();

        return view('livewire.show-requests', compact('requests','areas', 'folio'));
    }
}
