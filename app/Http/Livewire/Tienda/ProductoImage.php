<?php

namespace App\Http\Livewire\Tienda;

use App\Models\Image;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductoImage extends Component
{   public $producto;
   
    public function mount($producto_id){
        $this->producto=Producto::find($producto_id);
    }
    public function render()
    {
        return view('livewire.tienda.producto-image');
    }

    
    public function imagedestroy(Image $image){

        Storage::delete($image->url);
        $image->delete();
        
        if($this->producto->image==$image->url){
            if($this->producto->images->count()){
                $this->producto->image=$this->producto->images->first()->url;
                $this->producto->save();
            }else{
                $this->producto->image=null;
                $this->producto->save();
            }
        }

        $this->producto = Producto::find($image->imageable_id);

    }
}
