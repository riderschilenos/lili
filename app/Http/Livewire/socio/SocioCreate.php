<?php

namespace App\Http\Livewire\Socio;

use App\Models\Disciplina;
use App\Models\Socio;
use Illuminate\Support\Carbon;
use Livewire\Component;

class SocioCreate extends Component
{   
    public $invitados, $selectedSocios, $selectedInvitado, $search, $socio_id, $transportista_id, $socio;

    public function render()
    {   
        $disciplinas= Disciplina::pluck('name','id');

        $now = Carbon::now();

        if(auth()->user()->socio)
        {
            $socio = Socio::where('user_id',auth()->user()->id)->first();
        }
        else{
            $socio=null;
        }

        return view('livewire.socio.socio-create',compact('disciplinas','socio','now'));
    }
}
