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
    public $pagination = true;
    public $pages = 12;
    private function search()
    {
        if($this->search == '')
        {
            return $this->model::paginate($this->pages);
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

        if($this->pagination)
            return $data->paginate($this->pages);

        return $data->get();
    }

    private function completeSearch()
    {
        $data = $this->model::query();
        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) 
        {
            $data->where($opt,'LIKE',$query,'or');
        }

        if($this->pagination)
            return $data->paginate($this->pages);

        return $data->get();
    }
}