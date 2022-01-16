<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Serie;

class Search extends Component
{   
    public $search;

    public function render()
    {   

        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Serie::where('titulo','LIKE','%'.$this->search.'%')->where('status',3)->take(6)->get();
    }
}
