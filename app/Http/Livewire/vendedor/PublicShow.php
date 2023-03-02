<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Producto;
use Livewire\Component;

class PublicShow extends Component
{
    public function render()
    {   $productos=Producto::all();
        return view('livewire.vendedor.public-show',compact('productos'));
    }
}
