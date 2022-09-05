<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Evento;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $autos = Vehiculo::where('status',4)
            ->orwhere('status',5)
            ->orwhere('status',7)
            ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);

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
        return view('socio.index',compact('socio2','disciplinas','riders','series','autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $socios= Socio::all();

        return view('socio.create',compact('socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'born_date'=>'required',
            'prevision'=>'required',
            'username'=>'required',
            'rut'=>'required',
            'nro'=>'required',
            'slug'=>'required',
            'disciplina_id'=>'required'
            ]);
    
            
        Socio::create([
                    'name'=> $request->name,
                    'second_name'=> $request->second_name,
                    'last_name'=> $request->last_name,
                    'slug'=> $request->slug,
                    'born_date'=> $request->born_date,
                    'prevision'=> $request->prevision,
                    'fono'=> $request->fono,
                    'rut'=> $request->rut,
                    'nro'=> $request->nro,
                    'disciplina_id'=> $request->disciplina_id,
                    'user_id'=> $request->user_id]);
            
    
        

        if($request->evento_id=='suscripcion'){

            return redirect()->route('socio.create');
        }
        else{
            $evento = Evento::find($request->evento_id);
            return redirect()->route('checkout.evento', $evento);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Socio $socio)
    {   
        $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);

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

        return view('socio.show',compact('socio','socio2','disciplinas','riders','series','autos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Socio $socio)
    {   
        $disciplinas=Disciplina::pluck('name','id');

        return view('socio.edit',compact('socio','disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        

        $socio->update($request->all());

        return redirect()->route('socio.edit',$socio)->with('info','La información se actualizo con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fotos(Request $request, Socio $socio)
    {
        $request->validate([
            'foto'=>'image',
            'carnet'=>'image'
            ]);
            
            if($request->foto){
                if($socio->foto){
                    Storage::delete($socio->foto);
                }
                $foto = Str::random(10).$request->file('foto')->getClientOriginalName();
                $rutafoto = public_path().'/storage/socios/'.$foto;
                $img=Image::make($request->file('foto'))->orientate()
                    ->resize(1200, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutafoto);
                $img->orientate();
                $socio->update([
                        
                        'foto'=>'socios/'.$foto
                    ]);
            }

            if($request->carnet){
                if($socio->carnet){
                    Storage::delete($socio->carnet);
                }
                $carnet = Str::random(10).$request->file('carnet')->getClientOriginalName();
                $rutacarnet = public_path().'/storage/socios/'.$carnet;
      
                $img=Image::make($request->file('carnet'))->orientate()
                    ->resize(1200, null , function($constraint){
                    $constraint->aspectRatio();
                    })
                    ->save($rutacarnet);
                $img->orientate();
                $socio->update([
                        'carnet'=>'socios/'.$carnet,
                    ]);
            }

           


            return redirect()->route('socio.create');

        
        

      

    }

    public function entrenamiento(Socio $socio)
    {   $autos = Vehiculo::where('status',4)
        ->orwhere('status',5)
        ->orwhere('status',7)
        ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);

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

        return view('socio.entrenamientos.index',compact('socio','socio2','disciplinas','riders','series','autos'));

    }
}
