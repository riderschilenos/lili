<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a muchos

    public function modelos(){
        return $this->hasMany('App\Models\Modelo');
    }

    //relacion uno a muchos inversa 

    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina');
    }
}
