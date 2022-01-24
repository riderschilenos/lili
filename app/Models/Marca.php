<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function modelos(){
        return $this->hasMany('App\Models\Modelo');
    }

    public function marcas(){
        return $this->hasMany('App\Models\Marca');
    }
}
