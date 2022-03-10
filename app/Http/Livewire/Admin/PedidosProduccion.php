<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invitado;
use App\Models\Lote;
use App\Models\Orden;
use App\Models\Pedido;
use App\Models\Socio;
use App\Models\User;
use Livewire\Component;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use PDF;

class PedidosProduccion extends Component
{   public $selected=[];

    public $selectedetiquetas=[];

    public $paginate=4;

    use WithFileUploads;

    public $selectedProduccion, $selectedDescartar,$produccion, $descartar, $file, $etiquetas;

    public function render()
    {   $pedidos=Pedido::where('status',5)
        ->orwhere('status',6)
            ->paginate(100);

        $users=User::all();

        $invitados= Invitado::all();
        $socios= Socio::all();
        $lotes=Lote::where('estado',1)->latest('id')->paginate($this->paginate);
        $alllotes=Lote::where('estado',2)->latest('id')->paginate($this->paginate);
        

        return view('livewire.admin.pedidos-produccion',compact('pedidos','users','invitados','socios','lotes','alllotes'));
    }
    public function updateselectedproduccion(){

        $this->produccion= True;

        $this->reset(['descartar','etiquetas']);
    }


    public function updateselecteddescartar(){

        $this->descartar= True;
        $this->reset(['produccion','etiquetas']);
    }

    public function updateselectedetiquetas(){

        $this->etiquetas= True;
        $this->reset(['produccion','descartar']);
    }

    public function updatepaginate(){

        if ($this->paginate==4){
            $this->paginate=100;
        }else{
            $this->paginate=4;
     }
    }



    public function encaja()
    {
        if($this->file){
                
            $foto = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/ordens/'.$foto;
            $img=Image::make($this->file)->orientate()
                ->resize(1200, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();

        }else{
            $foto='nn';
        }

        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 3;
            $orden->save();
            if($foto!='nn'){
                $orden->image()->create([
                    'url'=>'ordens/'.$foto
                ]);
            }

            foreach($orden->pedido->ordens as $orden){

                if($orden->status==3){
                    $orden->pedido->status=6;
                    $orden->pedido->save();
    
                }else{
                    $orden->pedido->status=5;
                    $orden->pedido->save();
                    break;
                }

            } 
        }

        $this->reset(['selected','file']);
        
    }

    public function rediseñar()
    {

        foreach ($this->selected as $item){
            $orden = Orden::find($item);
            $orden->status = 1;
            $orden->save();
            
            
                    $orden->pedido->status=4;
                    $orden->pedido->save();
        }

        $this->reset(['selected']);
        
    }

    public function despachado(Pedido $pedido)
    {
        if($this->file){
                
            $foto = Str::random(10).$this->file->getClientOriginalName();
            $rutafoto = public_path().'/storage/pedidos/'.$foto;
            $img=Image::make($this->file)->orientate()
                ->resize(1200, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($rutafoto);
            $img->orientate();

        }else{
            $foto='nn';
        }

        $pedido->image()->create([
                    'url'=>'pedidos/'.$foto
                ]);

        $pedido->status=7;
        $pedido->save();
    

        $this->reset(['file']);
        
    }

    public function download(Lote $lote){
        return response()->download(storage_path('app/public/'.$lote->resource->url));
    }

    public function close(Lote $lote){

        $lote->estado=2;
        $lote->save();
 
    }

}
