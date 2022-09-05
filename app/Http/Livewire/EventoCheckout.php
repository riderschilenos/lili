<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Socio;
use Livewire\Component;

class EventoCheckout extends Component
{   
    public $evento, $selectedcategoria, $categoria_id;

    public function mount(Evento $evento){
        
        $this->evento =$evento;
        
    }

    public function render()
    {   
        $fechas= Fecha::where('evento_id',$this->evento->id)->paginate();
        $disciplinas= Disciplina::pluck('name','id');

        if(auth()->user()->socio)
        {
            $socio = Socio::where('user_id',auth()->user()->id)->first();
        }
        else{
            $socio=null;
        }

        return view('livewire.evento-checkout',compact('fechas','disciplinas','socio'));
    }

    public function updatedselectedcategoria($category_product){
       
        $this->categoria_id = $category_product;
    
    }
}
