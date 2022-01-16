<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function disciplina(){
        return $this->BelongsTo('App\Models\Disciplina');
    }

    // relacion muchos a muchos

    public function vehiculos(){
        return $this->belongsToMany('App\Models\Vehiculo');
    }

    //relacion uno a uno polimorfica
    public function direccion(){
        return $this->MorphOne('App\Models\Direccion','direccionable');
    }

}
