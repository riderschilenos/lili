<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Fecha_categoria;
use App\Models\Socio;
use App\Models\Ticket;
use Livewire\Component;

class TicketInscripcion extends Component
{   
    public $evento, $selectedcategoria, $categoria_id, $ticket, $nro;

    public function mount(Ticket $ticket){
        
    $this->evento =Evento::find($ticket->evento_id);

    $this->ticket = $ticket;

    }
    public function render()
    {   
        $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();

        $fecha = Fecha::where('evento_id',$this->evento->id)->first();

        

        $disciplinas= Disciplina::pluck('name','id');

        $socio = Socio::where('user_id',auth()->user()->id)->first();
        

        return view('livewire.organizador.ticket-inscripcion',compact('fechas','disciplinas','socio','fecha'));
    }

    public function updatedselectedcategoria($category_product){
       
        $this->categoria_id = $category_product;
        $this->fechacategoria=Fecha_categoria::find($this->categoria_id);
    }


}
