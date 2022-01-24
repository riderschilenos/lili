<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index(){
        return view('vehiculo.usados.index');
    }

    public function show(Vehiculo $vehiculo){
        return view('vehiculo.garage.show',compact('vehiculo'));
    }

    
}
