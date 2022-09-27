<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class EventoInscritos extends Component
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
    {   $sponsors = $this->evento->inscritos()->where('name','LIKE','%'. $this->search .'%')->paginate(5);

        return view('livewire.organizador.evento-inscritos',compact('sponsors'));
    }
}
