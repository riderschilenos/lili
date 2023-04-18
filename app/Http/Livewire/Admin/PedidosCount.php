<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedido;
use Livewire\Component;

class PedidosCount extends Component
{
    public function render()
    {   $diseños=Pedido::where('status',4);
        $produccion=Pedido::where('status',5);
        $despacho=Pedido::where('status',6);
        return view('livewire.admin.pedidos-count',compact('diseños','produccion','despacho'));
    }
}
