<?php

namespace App\Http\Controllers;

use App\Models\Filmmaker;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Socio;
use App\Models\Vehiculo;

class HomeController extends Controller
{

    public function __invoke()
    {   
      
        $vehiculos = Vehiculo::where('status',4)
                            ->orwhere('status',5)
                            ->orwhere('status',7)
                            ->latest('id')->get()->take(3);

        $series = Serie::where('status',3)->latest('id')->get()->take(8);

        $socios = Socio::where('status',1)->latest('id')->get()->take(4);
        
        if(auth()->user())
        {
            if(auth()->user()->socio)
            {
                $socio = Socio::where('user_id',auth()->user()->id)->first();
            }else{
                $socio=null;
            }
            
        }
        else{
            $socio=null;
        }
       
        return view('welcome',compact('series','socios','vehiculos','socio'));
        
    }
}
