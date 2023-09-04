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

    public $options = [
        'number' => 'Número',
        'name' => 'Nombre',
        'type' => 'Tipo de documento'
    ];
    public $option;

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

    private function search()
    {
        if($this->option == '')
        {
            return Request::paginate(12);
        }

        $requests = Request::query();
        $query = '%' . $this->search . '%';

        switch ($this->option) {
            case 'number':
                $requests->where('number','LIKE', $query);
                break;

            case 'name':
                $requests->where('name','LIKE', $query);
                break;

            case 'type':
                $requests->where('document_type','LIKE', $query);
                break;
        }

        return $requests->paginate(12);
    }
}
