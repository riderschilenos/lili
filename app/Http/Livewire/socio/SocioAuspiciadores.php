<?php

namespace App\Http\Livewire\Socio;

use App\Models\Auspiciador;
use App\Models\Socio;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class SocioAuspiciadores extends Component
{   
    use WithFileUploads;

    use AuthorizesRequests;

    public $user, $socio , $current=NULL, $formulario=FALSE, $auspiciadores;

    public function mount(Socio $socio){
        $this->user= User::find($socio->user_id);
        $this->auspiciadores=$this->user->auspiciadors;
        $this->socio= $socio;}

    public function render()
    {
        return view('livewire.socio.socio-auspiciadores');
    }

    public function show(Auspiciador $auspiciador){
        if($this->current){
            if($this->current->id!=$auspiciador->id){
                $this->reset(['formulario']);
                $this->current = $auspiciador;
            }else{
                $this->current=NULL;
            }
        }else{
            $this->reset(['formulario']);
            $this->current = $auspiciador;
        }
    }

    public function formulario(){
        if($this->formulario){
                $this->formulario=FALSE;
        }else{
            $this->reset(['current']);
            $this->formulario = TRUE;
        }
    }

    public function destroy(Auspiciador $auspiciador){
        

        Storage::delete($auspiciador->logo);
        $this->current->delete();
        $this->current=NULL;
       


    }
}
