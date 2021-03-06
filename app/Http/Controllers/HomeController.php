<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;

class HomeController extends Controller
{

    public function __invoke()
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

        return view('welcome',compact('series','riders','autos','socio2','disciplinas'));
        
    }
}
