<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosIndex extends Component
{   
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {   

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();

        $pedidos=Pedido::where('id','LIKE','%'.$this->search.'%')
                ->orwhere('user_id','LIKE', '%'.$this->search.'%' )
                ->paginate(100);

        return view('livewire.admin.pedidos-index',compact('pedidos','users','invitados','socios'));
    }

    public function limpiar_page(){
        $this->resetPage();
    }
}
