<?php

namespace App\Http\Livewire\Socio;

use App\Models\Resultado;
use App\Models\Socio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class CurriculumDeportivo extends Component
{   
    use WithFileUploads;

    use AuthorizesRequests;

    public $socio , $socioid, $current=NULL, $formulario=FALSE;
    
    public function mount(Socio $socio){
        $this->socio= $socio;
    }

    public function render()
    {   $resultados=Resultado::where('user_id', $this->socio->user->id)->where('status',2)->get();

        return view('livewire.socio.curriculum-deportivo',compact('resultados'));
    }
}
