<?php

namespace App\Http\Livewire;

use App\Models\Request;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRequests extends Component
{
    use WithPagination;
    use Search;

    public function __construct(){

        $this->model = Request::class;
        $this->options = [
            'number' => 'Número',
            'name' => 'Nombre',
            'document_type' => 'Tipo de documento'
        ];

        $this->filter = true;
        $this->filters = [
            'date' => 'all'
        ];
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = $this->query();
        $requests = $this->get($query,'>');
        $areas = Area::all()->except([1]);
        $folio = Request::getFolioForRequest();
        $options = $this->options;

        return view('livewire.show-requests', compact('requests','areas', 'folio', 'options'));
    }

}
