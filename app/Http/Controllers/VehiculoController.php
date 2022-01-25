<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'año'=>'required',
           // 'slug'=>'required|unique:vehiculos',
            'file'=>'required|image|max:2048'

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
    
            return redirect()->route('garage.vehiculos.index');

        }
        elseif($request->status==1){

            return redirect()->route('garage.usados');
        }

    }

    
}
