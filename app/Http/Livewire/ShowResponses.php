<?php

namespace App\Http\Livewire;

use App\Models\Response;
use App\Models\Area;
use Livewire\Component;
use Livewire\WithPagination;

class ShowResponses extends Component
{
    use WithPagination;
    use Search;

    public function __construct(){

        $this->model = Response::class;
        $this->options = [
            'folio' => 'Folio',
            'document_type' => 'Tipo de documento',
            'status' => 'Estado'
        ];
        $this->filter=true;
        $this->filters=[
            'status' => 'all'
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $responses = $this->get($this->query()
        ->orderByRaw("FIELD(status , 'Vigente', 'Contestado', 'Cancelado') ASC"));
        $areas = Area::all();
        $options = $this->options;

        return view('livewire.show-responses', compact('responses','areas', 'options'));
    }

}
