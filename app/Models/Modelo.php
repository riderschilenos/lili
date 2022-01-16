<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    //relacion uno a muchos inversa 

    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }
    //relacion uno a muchos

    public function ordenes(){
        return $this->hasMany('App\Models\Orden');
    }
}
