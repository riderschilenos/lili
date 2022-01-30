<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

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
            'slug'=> Str::random(10),
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

        if($vehiculo->image->count()){

            return view('vehiculo.usados.comision', compact('vehiculo'));
        }else{
            return redirect()->route('garage.image',$vehiculo)->with('info','No puedes avanzar sin haber subido al menos una imagen');
        }

        
        
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
            'file'=>'required|image'
        ]);

        $images = $request->file('file')->store('vehiculos');

        $url = Storage::url($images);

        $vehiculo->image()->create([
            'url'=>$url
        ]);

        return redirect()->route('garage.image',$vehiculo);
    /*  
        $request->validate([
            'file'=>'required|image'
        ]);

        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();

        $ruta = storage_path().'\app\public\vehiculos/'.$nombre;

        Image::make($request->file('file'))
                ->resize(1200, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);

        $vehiculo->image()->create([
                    'url'=>'vehiculos/'.$nombre
                ]);

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
