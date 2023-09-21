<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Test extends Component
{
    public $open = true;
    public $search;
    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search.'%')->get();
        return view('livewire.test',compact(['users']));
    }
}
