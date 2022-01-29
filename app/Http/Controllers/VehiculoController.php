<?php

namespace App\Http\Controllers;

//use App\Models\Image;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class VehiculoController extends Controller
{   
    
    public function index(){
        return view('vehiculo.usados.index');
    }

    public function personalindex(){
        return view('vehiculo.garage.index');
    }

    public function create(){

        return view('vehiculo.garage.create');
    }

    public function vender(){

        return view('vehiculo.usados.create');
    }

    public function show(Vehiculo $vehiculo){
        return view('vehiculo.garage.show',compact('vehiculo'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'marca_id'=>'required',
            'modelo'=>'required',
            'año'=>'required'
           // 'slug'=>'required|unique:vehiculos',

        ]);

        $vehiculo = Vehiculo::create([
            'marca_id'=> $request->marca_id,
            'modelo'=> $request->modelo,
            'cilindrada'=> $request->cilindrada,
            'aro_front'=> $request->aro_front,
            'aro_back'=> $request->aro_back,
            'año'=> $request->año,
            'slug'=> 'test',
            'status'=> $request->status,
            'precio'=> $request->precio,
            'descripcion'=> $request->descripcion,
            'user_id'=> $request->user_id,
            'vehiculo_type_id'=> $request->vehiculo_type_id
            ]);
        
        

        if($request->file('file')){

                $url = Storage::put('vehiculos',$request->file('file'));
    
                $vehiculo->image()->create([
                    'url'=>$url
                ]);
            }

        if($request->status==2){
            
            $vehiculo->socios()->attach($request->socio_id);

            return redirect()->route('garage.image',$vehiculo);

        }
        elseif($request->status==1){

            return redirect()->route('garage.image',$vehiculo);
        }

    }

    public function comision(Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);

        
        return view('vehiculo.usados.comision', compact('vehiculo'));
    }

    public function imageupload(Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);

        
        return view('vehiculo.fotos', compact('vehiculo'));
    }

    public function upload(Request $request, Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);
       
        $request->validate([
            'file'=>'required|image|max:10240'
        ]);

        $images = $request->file('file')->store('vehiculos');

        $url = Storage::url($images);

        $vehiculo->image()->create([
            'url'=>$url
        ]);
    /*
        $nombre = $request->file('file')->getClientOriginalName();
        $ruta = storage_path().'\app\public\vehiculos';
        
        return $ruta;

        Image::make($request->file('file'))->save();
*/
    }

    public function precio(Request $request, Vehiculo $vehiculo)
    {   
        $request->validate([
            'precio'=>'required'
        ]);

        $vehiculo->update($request->all());
        
        return redirect()->route('garage.comision',$vehiculo);
    }

    
}
