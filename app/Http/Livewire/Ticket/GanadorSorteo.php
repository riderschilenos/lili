<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Evento;
use App\Models\Ganadorsorteo as ModelsGanadorsorteo;
use App\Models\Inscripcion;
use Livewire\Component;

class GanadorSorteo extends Component
{   public $evento,$premio;

    public function mount(Evento $evento){
        $this->evento=$evento;
    }

    public function render()
    {
        return view('livewire.ticket.ganador-sorteo');
    }

    public function add_winner(){
        $inscripcion=Inscripcion::whereHas('ticket', function ($query) {
                        $query->where('evento_id', $this->evento->id);
                    })->inRandomOrder()->first();

        ModelsGanadorsorteo::create(['inscripcion_id'=>$inscripcion->id,
                                'name'=>$inscripcion->ticket->user->name,
                                'nro_premio'=>$inscripcion->id,
                                'premio'=>$this->premio,
                                'evento_id'=>$inscripcion->ticket->evento_id]);
        $this->reset(['premio']);

        $this->evento=Evento::find($this->evento->id);

    }

}
