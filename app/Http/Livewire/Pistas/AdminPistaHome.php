<?php

namespace App\Http\Livewire\Pistas;

use App\Models\Evento;
use App\Models\Pedido;
use Livewire\Component;

class AdminPistaHome extends Component
{
    public function render()
    {   $pistas=Evento::where('type','pista')->where('user_id',auth()->user()->id)->get();
        $diseños=Pedido::where('status',4);
        $produccion=Pedido::where('status',5);
        $despacho=Pedido::where('status',6);

        return view('livewire.pistas.admin-pista-home',compact('pistas','diseños','produccion','despacho'));
    }
}
