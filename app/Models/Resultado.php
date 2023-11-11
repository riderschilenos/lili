<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    
    const BORRADOR =1;
    const PUBLICADO =2;
    const CERRADO =3;
    
     //relacion uno a uno polimorfica
     public function image(){
        return $this->morphMany('App\Models\Image','imageable');
    }
    
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeDisciplina($query,$disciplina_id){
        if($disciplina_id){
            return $query->where('disciplina_id',$disciplina_id);
        }
    }

    public function disciplina(){
        return $this->BelongsTo('App\Models\Disciplina');
    }
    
    //relacion uno uno inversa

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
