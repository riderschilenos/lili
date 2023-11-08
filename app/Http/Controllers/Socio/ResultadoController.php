<?php

namespace App\Http\Controllers\Socio;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Cache;
use App\Models\Resultado;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $resultado=Resultado::where('user_id',auth()->user()->id)->where('status',1)->first();
        if ($resultado) {
            return redirect()->route('socio.resultados.edit',$resultado);
        }
        
        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }
        
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

        $resultado=Resultado::where('user_id',auth()->user()->id)->where('status',1)->first();
        if (is_null($resultado)) {
            $resultado=Resultado::create(['user_id'=>auth()->user()->id]);
        }
        
        $socio=Socio::where('user_id',$resultado->user_id)->first();

        return view('socio.editresultado',compact('socio','resultado','socio2','disciplinas','riders','series','autos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resultado $resultado)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultado $resultado)
    {
        
        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',6)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(4);
            Cache::put('series',$series);
         }


        if(Cache::has('riders')){
            $riders = Cache::get('riders');
        }else{
           $riders = Socio::join('users','socios.user_id','=','users.id')
            ->select('socios.*','users.name','users.email','users.updated_at')->where('status',1)
            ->orwhere('status',2)
            ->orderByRaw("CASE WHEN users.profile_photo_path IS NOT NULL THEN 0 ELSE 1 END, 
            CASE WHEN socios.created_at >= CURDATE() THEN 0 ELSE 1 END, 
            CASE WHEN socios.updated_at >= CURDATE() THEN 0 ELSE 1 END, 
            id DESC")->get()->take(4);
            Cache::put('riders',$riders);
         }
        
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
        
        $socio=Socio::where('user_id',$resultado->user_id)->first();

        return view('socio.editresultado',compact('socio','resultado','socio2','disciplinas','riders','series','autos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultado $resultado)
    {       
        $request->validate([
            'titulo'=>'required',
            'descripcion'=>'required'
        ]);

        $resultado->update($request->all());
        
        return redirect(route('socio.show',$resultado->user->socio).'/#curriculum');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultado  $resultado)
    {   $socio=$resultado->user->socio;
        
        $resultado->delete();
        

        return redirect()->route('socio.show',$socio)->with('info','El Registo se elimino con éxito.');

    }
}
