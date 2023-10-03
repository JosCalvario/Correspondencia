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
    public $filter = false;
    public $filters = [];
    private function search()
    {
        $data = $this->model::query();

        if($this->search == '')
        {
            return $this->get($data);
        }
        
        if($this->option == '')
        {
            return $this->completeSearch();
        }

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

    private function query()
    {
        $data = $this->model::query();

        if($this->search == '')
        {
            return $data;
        }
        
        if($this->option == '')
        {
            return $this->completeQuery();
        }

        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) {
            if($this->option == $opt)
            {
                $data->where($opt,'LIKE',$query);
                break;
            }
        }

        return $data;
    }

    private function completeSearch()
    {
        $data = $this->model::query();
        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) 
        {
            $data->where($opt,'LIKE',$query,'or');
        }

        return $this->get($data);
    }

    private function completeQuery()
    {
        $data = $this->model::query();
        $query = '%' . $this->search . '%';

        foreach ($this->options as $opt => $value) 
        {
            $data->where($opt,'LIKE',$query,'or');
        }

        return $data;
    }

    private function get($query, $fil = '=')
    {
        if($this->filter)
        {
            foreach($this->filters as $filter => $value)
            {
                if($value=='all')
                    break;
                    
                $query->where($filter, $fil, $value);
            }
        }
        
        if($this->pagination)
        {
            return $query->paginate($this->pages);
        }
        return $query->get();
        
    }
}