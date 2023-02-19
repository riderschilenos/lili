<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class RetiroDinero extends Component
{   
    use WithPagination;

    use AuthorizesRequests;

    public $evento,$search;

    public function mount(Evento $evento){

        $this->evento=$evento;
        
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {    $tickets = $this->evento->tickets()->where('status',2)->paginate(5);

        return view('livewire.organizador.retiro-dinero',compact('tickets'));
    }
}
