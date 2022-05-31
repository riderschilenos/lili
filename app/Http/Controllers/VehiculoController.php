<?php

namespace App\Http\Controllers;

//use App\Models\Image;

use App\Models\Disciplina;
use App\Models\Qrregister;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Vehiculo_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

class VehiculoController extends Controller
{   
    
    public function index(){
        return view('vehiculo.usados.index');
    }

    public function personalindex(){
        return view('vehiculo.garage.index');
    }
    
    public function registerindex(){
        $vehiculos = Vehiculo::where('status',6)
                            ->latest('id')->get();

        return view('vehiculo.index',compact('vehiculos'));
    }
    

    public function create(){

        return view('vehiculo.garage.create');
    }

    public function vender(){

        return view('vehiculo.usados.create');
    }

    public function edit(Vehiculo $vehiculo){

        if($vehiculo->vehiculo_type_id==1 or $vehiculo->vehiculo_type_id==2 or $vehiculo->vehiculo_type_id==3 or $vehiculo->vehiculo_type_id==7){
            $disciplina_id=1;
        }

        if($vehiculo->vehiculo_type_id==9 or $vehiculo->vehiculo_type_id==10 or $vehiculo->vehiculo_type_id==11){
            $disciplina_id=2;
        }
        
        if($vehiculo->vehiculo_type_id==12 or $vehiculo->vehiculo_type_id==13 or $vehiculo->vehiculo_type_id==14){
            $disciplina_id=9;
        }

        return view('vehiculo.garage.edit',compact('vehiculo','disciplina_id'));
    }
    
    public function editusados(Vehiculo $vehiculo){

        if($vehiculo->vehiculo_type_id==1 or $vehiculo->vehiculo_type_id==2 or $vehiculo->vehiculo_type_id==3 or $vehiculo->vehiculo_type_id==7){
            $disciplina_id=1;
        }

        if($vehiculo->vehiculo_type_id==9 or $vehiculo->vehiculo_type_id==10 or $vehiculo->vehiculo_type_id==11){
            $disciplina_id=2;
        }
        
        if($vehiculo->vehiculo_type_id==12 or $vehiculo->vehiculo_type_id==13 or $vehiculo->vehiculo_type_id==14){
            $disciplina_id=9;
        }

        return view('vehiculo.usados.edit',compact('vehiculo','disciplina_id'));
    }
    public function update(Request $request, Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);


        $vehiculo->update($request->all());
        

        return redirect()->route('garage.image',$vehiculo);
    }

    public function show(Vehiculo $vehiculo){

        $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->latest('id')->get()->take(8);

        $riders = Socio::where('status',1)->latest('id')->get()->take(4);
        
        if(auth()->user())
        {
            if(auth()->user()->socio)
            {
                $socio2 = Socio::where('user_id',auth()->user()->id)->first();
            }else{
                $socio2=null;
            }
            
        }
        else{
            $socio2=null;
        }

       $disciplinas= Disciplina::pluck('name','id');

        $qr=Qrregister::where('slug', $vehiculo->slug)->first();

        return view('vehiculo.garage.show',compact('vehiculo','qr','socio2','disciplinas','riders','series','autos'));
    }

    public function store(Request $request)
    {   
        if($request->status==1){
            $request->validate([
                'marca_id'=>'required',
                'nombre'=>'required',
                'fono'=>'required',
                'ubicacion'=>'required',
               // 'slug'=>'required|unique:vehiculos',
    
            ]);
        }else{
            $request->validate([
                'marca_id'=>'required',
                'modelo'=>'required',
                'año'=>'required',
                'nro_serie'=>'required'
                
               // 'slug'=>'required|unique:vehiculos',
    
            ]);
        }

        

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
            'property'=> $request->property,
            'nombre'=> $request->nombre,
            'nro_serie'=> $request->nro_serie,
            'fono'=> $request->fono,
            'email'=> $request->email,
            'ubicacion'=> $request->ubicacion,
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

    public function pagoinscripcion(Vehiculo $vehiculo)
    {   
        //$this->authorize('dicatated',$serie);

        if($vehiculo->image->count()){

            return view('vehiculo.garage.inscripcion', compact('vehiculo'));
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
      /*    
        
        $request->validate([
            'file'=>'required|image|max: 9216'
        ]);

        $images = $request->file('file')->store('vehiculos');

        //$url = Storage::url($images);

        $vehiculo->image()->create([
            'url'=>$images
        ]);

        return redirect()->route('garage.image',$vehiculo);
     */
        $request->validate([
            'file'=>'required|image'
        ]);
        $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
        $ruta = public_path().'/storage/vehiculos/'.$nombre;
        Image::make($request->file('file'))->orientate()
                ->resize(1200, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
        $vehiculo->image()->create([
                    'url'=>'vehiculos/'.$nombre
                ]);   

        return redirect()->route('garage.image',$vehiculo);

    }

    public function precio(Request $request, Vehiculo $vehiculo)
    {   
       

        $vehiculo->update($request->all());

        
        return redirect()->back();
        
    }

    public function publicar(Vehiculo $vehiculo)
    {   
        $vehiculo->status=5;

        $vehiculo->save();

        return redirect()->route('garage.vehiculo.show',$vehiculo);
    }

    public function inscribir(Vehiculo $vehiculo)
    {   
        $vehiculo->status=6;

        $vehiculo->save();

        return redirect()->route('garage.inscripcion',$vehiculo);
    }

    public function activarqr(Request $request, Vehiculo $vehiculo)
    {   
        $request->validate([
            'nro'=>'required',
            'pass'=>'required'

        ]);

        $qr=Qrregister::where('nro', $request->nro)->first();
       
        if($qr){
            if($qr->pass==$request->pass){
                if(is_null($qr->active_date)){
                    $qr->active_date=Carbon::now();
                    $qr->save();
                }else{
                    return redirect()->route('garage.inscripcion',$vehiculo)->with('info','El codigo QR ya esta en uso.');
                }
                $vehiculo->status=6;
                $vehiculo->slug=$qr->slug;
                if($qr->value==5000){
                    $vehiculo->insc=2;
                }else{
                    $vehiculo->insc=3;
                }

                $vehiculo->save();

                return redirect()->route('garage.inscripcion',$vehiculo);
            } else{
                return redirect()->route('garage.inscripcion',$vehiculo)->with('info','NRO o PASS no coinciden.');;
            }
        }else{
            return redirect()->route('garage.inscripcion',$vehiculo)->with('info','NRO o PASS no coinciden.');;
        }
        
        
    }

    
    
}
