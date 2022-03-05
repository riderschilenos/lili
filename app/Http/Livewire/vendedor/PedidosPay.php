<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Pago;
use App\Models\Pedido;
use App\Models\Socio;
use Livewire\Component;

class PedidosPay extends Component
{   public $selected=[];

    public $selectedTransfencia, $selectedMercadopago,$transferencia, $mercadopago;

    public function render()
    {   $invitados= Invitado::all();
        $socios= Socio::all();

        
        
        $pedidos= Pedido::where('user_id',auth()->user()->id)
                            ->where('status',2)
                            ->orderby('status','DESC')
                            ->latest('id')
                            ->get();

        $pagos=Pago::where('user_id',auth()->user()->id)
                                ->where('estado',2)
                                ->orderby('estado','DESC')
                                ->latest('id')
                                ->get();
        

        return view('livewire.vendedor.pedidos-pay',compact('pedidos','invitados','socios','pagos'));
    }

    public function updateselectedtransferencia(Socio $socio){

        $this->transferencia= True;

        $this->reset(['mercadopago']);
    }

    public function updateselectedmercadopago(Socio $socio){

        $this->mercadopago= True;
        $this->reset(['transferencia']);
    }
}
