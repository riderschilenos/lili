<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosSearch extends Component
{   use WithPagination;

    public function render()
    {   $pedidos = Pedido::whereHas('ordens', function ($query) {
        $query->whereHas('producto', function ($queryProducto) {
            $queryProducto->where('tienda_id', 4);
        });
    })->paginate(50);

        return view('livewire.tienda.productos-search',compact('pedidos'));
    }
}
