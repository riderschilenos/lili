<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class PublicShow extends Component
{   use WithPagination;

    public $search;

    public function render()
    {   $productos=Producto::where('name','LIKE','%'. $this->search .'%')
                ->latest('id')
                ->paginate(16);
       
        return view('livewire.vendedor.public-show',compact('productos'));
    }

    
    public function limpiar_page(){
        $this->resetPage();
    }
}
