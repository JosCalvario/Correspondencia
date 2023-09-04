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
        
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $requests = $this->search();
        $areas = Area::all();
        $folio = Request::getFolioForRequest();
        $options = $this->options;

        return view('livewire.show-requests', compact('requests','areas', 'folio', 'options'));
    }

}
