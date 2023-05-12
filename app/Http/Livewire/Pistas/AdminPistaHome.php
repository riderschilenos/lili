<?php

namespace App\Http\Livewire\Pistas;

use App\Models\Evento;
use App\Models\Inscripcion;
use App\Models\Pedido;
use App\Models\Retiro;
use Livewire\Component;

class AdminPistaHome extends Component
{
    public function render()
    {   $pista=Evento::where('type','pista')->where('user_id',auth()->user()->id)->first();
        $inscripciones = Inscripcion::join('tickets','inscripcions.ticket_id','=','tickets.id')
                    ->select('inscripcions.*','tickets.evento_id')
                    ->where('evento_id',$pista->id)
                    ->where('estado','>=',2)
                    ->orderby('categoria_id','DESC')
                    ->paginate(50);
        $tickets = $pista->tickets()->where('status','>=',3)->get();
        $retiros = Retiro::where('evento_id',$pista->id)->get();

        return view('livewire.pistas.admin-pista-home',compact('tickets','retiros','pista','inscripciones'));
    }
}
