<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Lote;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;

class PedidosProduccion extends Component
{   public $selected=[];

    public $paginate=4;

    public $selectedProduccion, $selectedDescartar,$produccion, $descartar;

    public function render()
    {   $pedidos=Pedido::where('status',5)
            ->paginate(100);

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();
        $lotes=Lote::where('estado',1)->latest('id')->paginate($this->paginate);

        return view('livewire.admin.pedidos-produccion',compact('pedidos','users','invitados','socios','lotes'));
    }
    public function updateselectedproduccion(){

        $this->produccion= True;

        $this->reset(['descartar']);
    }


    public function updateselecteddescartar(){

        $this->descartar= True;
        $this->reset(['produccion']);
    }

    public function updatepaginate(){

        if ($this->paginate==4){
            $this->paginate=100;
        }else{
            $this->paginate=4;
     }
    }



    public function descartar()
    {
        
        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 3;
            $orden->save();
            foreach($orden->pedido->ordens as $orden){

                if($orden->status==2){
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

    public function download(Lote $lote){
        return response()->download(storage_path('app/public/'.$lote->resource->url));
    }
}
