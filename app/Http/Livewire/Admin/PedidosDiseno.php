<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;

class PedidosDiseno extends Component
{   public $selected=[];

    public $selectedProduccion, $selectedDescartar,$produccion, $descartar;

    public function render()
    {   $pedidos=Pedido::where('status',4)
        ->paginate(100);

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();

        return view('livewire.admin.pedidos-diseno',compact('pedidos','users','invitados','socios'));
    }

    public function updateselectedproduccion(){

        $this->produccion= True;

        $this->reset(['descartar']);
    }

    public function updateselecteddescartar(){

        $this->descartar= True;
        $this->reset(['produccion']);
    }

    public function descartar()
    {
        
        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 2;
            $orden->save();
            foreach($orden->pedido->ordens as $orden){

                if($orden->status==2||$orden->status==3){
                    $orden->pedido->status=5;
                    $orden->pedido->save();
    
                }else{
                    $orden->pedido->status=4;
                    $orden->pedido->save();
                    break;
                }

            } 

        }

        $this->reset(['selected']);
        
    }
}
