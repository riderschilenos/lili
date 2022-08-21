<?php

namespace App\Http\Livewire\Organizador;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Fecha;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class FechaCategorias extends Component
{
    use WithFileUploads;

    use AuthorizesRequests;

    public $fecha;

    public $evento;

    public $selected=[];

    public function mount(Fecha $fecha){
        $this->fecha = $fecha;
        $this->evento = Evento::find($fecha->evento_id);
    }

    public function render()
    {   
        $categorias=Categoria::where('disciplina_id',$this->fecha->evento->disciplina_id)->get();

        return view('livewire.organizador.fecha-categorias',compact('categorias'));
    }

    public function selectedcategoria($categoria){   
        $this->selectedcategoria=[$this->selectedcategoria,$categoria];
    }

}
