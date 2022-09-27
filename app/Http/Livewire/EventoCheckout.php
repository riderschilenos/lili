<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Fecha_categoria;
use App\Models\Inscripcion;
use App\Models\Socio;
use App\Models\Ticket;
use Livewire\Component;

class EventoCheckout extends Component
{   
    public $evento, $selectedcategoria, $categoria_id, $categoria, $nro, $ticket, $socio;


    public function mount(Evento $evento){
        
        $this->evento =$evento;

        if(auth()->user()->socio)
        {
            $this->socio = Socio::where('user_id',auth()->user()->id)->first();
            if(Ticket::where('evento_id',$this->evento->id)->where('user_id',auth()->user()->id)){    
                $this->ticket = Ticket::where('evento_id',$this->evento->id)->where('user_id',auth()->user()->id)->first();
            }else{
                $this->ticket =null;
            }
                            
        }
        else{
            $this->socio=null;
            $this->ticket =null;
        }
        
    }

    public function render()
    {   
        $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();
        $disciplinas= Disciplina::pluck('name','id');

       

        return view('livewire.evento-checkout',compact('fechas','disciplinas'));
    }

    public function updatedselectedcategoria($category_product){
       
        $this->categoria_id = $category_product;
        $this->fechacategoria=Fecha_categoria::find($this->categoria_id);
    }

    public function add(Fecha_categoria $fecha){
        $rules = [
            'nro'=>'required'
        ];

        $this->validate ($rules);
        
        $inscripcion = Inscripcion::create([
            'ticket_id'=> $this->ticket->id,
            'fecha_categoria_id'=> $this->categoria_id,
            'nro'=> $this->nro,
            'fecha_id'=> $fecha->id
        ]);

        $this->reset(['ticket','nro']);

        return redirect()->route('checkout.evento',$this->evento).'/#pago';
    }
}
