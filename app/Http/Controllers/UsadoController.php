<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class UsadoController extends Controller
{
    public function index(){
        return view('usados.index');
    }

    public function show(Vehiculo $vehiculo){
        return view('usados.show',compact('vehiculo'));
    }    
}
