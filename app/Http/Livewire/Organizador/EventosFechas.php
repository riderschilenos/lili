<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Evento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventosFechas extends Component
{   
    use WithFileUploads;

    use AuthorizesRequests;

    public $evento;

    public function mount(Evento $evento){
        $this->evento = $evento;
    }

    public function render()
    {
        return view('livewire.organizador.eventos-fechas');
    }
}
