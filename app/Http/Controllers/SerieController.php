<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;
use App\Models\Video;


use Illuminate\Support\Facades\Cache;

class SerieController extends Controller
{
    public function index(){

        if(Cache::has('autos')){
            $autos = Cache::get('autos');
        }else{
            $autos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);
            Cache::put('autos',$autos);
         }

        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
            Cache::put('series',$series);
         }


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

        return view('serie.index',compact('series','riders','autos','socio2','disciplinas'));
    }

    public function show(Serie $serie){

        $this->authorize('published',$serie);
        
        $videos= Video::where('serie_id',$serie->id)
                        ->paginate();
        $similares = Serie::where('disciplina_id',$serie->disciplina_id)
                            ->where('content','serie')
                            ->where('id','!=',$serie->id)
                            ->where('status',3)
                            ->latest('id')
                            ->take(5)
                            ->get();
        $autos = Vehiculo::where('status',4)
            ->orwhere('status',5)
            ->orwhere('status',7)
            ->latest('id')->get()->take(3);
                    
        if(Cache::has('series')){
            $series = Cache::get('series');
        }else{
            $series = Serie::where('status',3)->where('content','serie')->latest('id')->get()->take(8);
            Cache::put('series',$series);
         }

                    
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

        return view('serie.show',compact('serie','videos','similares','series','riders','autos','socio2','disciplinas'));
    }

    public function enrolled(Serie $serie){
        $serie->sponsors()->attach(auth()->user()->id);

        return redirect()->route('series.status',$serie);
    }




}
