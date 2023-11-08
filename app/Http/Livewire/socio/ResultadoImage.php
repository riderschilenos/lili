<?php

namespace App\Http\Livewire\Socio;

use App\Models\Image;
use App\Models\Resultado;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ResultadoImage extends Component
{   public $images;

    public function mount(Resultado $resultado){

        $this->resultado = $resultado;

    }

    public function render()
    {
        return view('livewire.socio.resultado-image');
    }

    public function destroy(Image $image){

        Storage::delete($image->url);
        $image->delete();

        $this->resultado = Resultado::find($image->imageable_id);

    }
   
}
