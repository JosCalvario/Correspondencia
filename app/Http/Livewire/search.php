<?php
namespace App\Http\Livewire;

trait Search
{
    public $search = '';
    public $model;
    public $option;
    public $options = [
        'id' => 'Id'
    ];
    public $pagination = 12 ;
    private function search()
    {
        if($this->search == '')
        {
            return $this->model::paginate($this->pagination);
        }
        
        if($this->option == '')
        {
            return $this->completeSearch();
        }

        $data = $this->model::query();
        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) {
            if($this->option == $opt)
            {
                $data->where($opt,'LIKE',$query);
                break;
            }
        }

        return $data->paginate($this->pagination);
    }

    private function completeSearch()
    {
        $data = $this->model::query();
        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) 
        {
            $data->where($opt,'LIKE',$query,'or');
        }

        return $data->paginate($this->pagination);
    }
}