<?php

namespace App\Http\Livewire\Socio;

use App\Models\Direccion;
use App\Models\Disciplina;
use App\Models\Socio;
use App\Models\Suscripcion;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Cache;

class SocioCreate extends Component
{   
    public $invitados, $file, $selectedSocios, $selectedInvitado, $search, $socio_id, $transportista_id,$socioimage;

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

    public function destroydireccion(Direccion $direccion){

        $direccion->delete();

    }

    public function imageupdate()
    {   
        $this->validate([
            'file'=>'required|image|max:2048'
        ]);

       
        
        if(auth()->user()->profile_photo_url){
            Storage::delete($this->socio->user->profile_photo_url);

            $nombre = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/profile-photos/'.$nombre;
            $img=Image::make($this->file)->orientate()
                ->resize(400, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
            
        
            auth()->user->forceFill([
                'profile_photo_path'=>'profile-photos/'.$nombre
                    ])->save();
            Cache::flush();

        }
        else{
            $nombre = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/profile-photos/'.$nombre;
            $img=Image::make($this->file)->orientate()
                ->resize(400, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();
            
        
            auth()->user->forceFill([
                'profile_photo_path'=>'profile-photos/'.$nombre
                    ])->save();
            Cache::flush();
        }

        $this->reset(['socioimage']);

        $this->reset(['file']);
    }
}
