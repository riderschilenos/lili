<?php

namespace App\Http\Livewire\Vendedor;

use App\Models\Invitado;
use App\Models\Socio;
use App\Models\Transportista;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;



class PedidosCreate extends Component
{   
    public $invitados, $selectedSocios, $selectedInvitado, $selecteddespacho, $search, $socio_id, $transportista_id, $transportistas;
    

    use WithPagination;


    public function render()
    {   
        
        $socios = Socio::join('users','socios.user_id','=','users.id')
                    ->select('socios.*','users.name','users.email')
                    ->where('socios.status',1)
                    ->where('rut','LIKE','%'. $this->search .'%')
                    ->orwhere('email','LIKE','%'. $this->search .'%')
                    ->orwhere('socios.name','LIKE','%'. $this->search .'%')
                    ->latest('id')
                    ->paginate(8);


        

        return view('livewire.vendedor.pedidos-create',compact('socios'));
    }

    public function updateselectedSocios(Socio $socio){

        $this->selectedSocios= Socio::all();

        $this->reset(['invitados']);
    }

    public function updateselectedInvitado(Socio $socio){

        $this->invitados= Invitado::all();
        $this->reset(['selectedSocios']);
    }

    public function updatedselecteddespacho($selecteddespacho){
        
        if($selecteddespacho==1){
            $this->transportistas = Transportista::where('id',1)->pluck('name','id');
        }

        if($selecteddespacho==2){
            $this->transportistas = Transportista::where('id',1)
                                            ->orwhere('id',2)
                                            ->pluck('name','id');
        }
        if($selecteddespacho==3){
            $this->transportistas = Transportista::where('id',3)->pluck('name','id');
        }
        


    
    }

    public function updatesocio_id($socio_id){

        $this->reset(['invitados']);

        $this->selectedSocios= Socio::join('users','socios.user_id','=','users.id')
                            ->select('socios.*','users.name','users.email')
                            ->get();

        $this->socio_id = $socio_id;
    }



    public function cancel(){
        $this->reset(['selectedSocios','invitados','socio_id']);
    }

    public function resetsocio(){
        $this->reset(['socio_id']);
    }

    public function limpiar_page(){
        $this->resetPage();
    }

}
