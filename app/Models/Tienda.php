<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $guarded = ['id','status'];

    const BORRADOR =1;
    const REVISION =2;
    const PUBLICADO =3;

    
    public function scopeDisciplina($query,$disciplina_id){
        if($disciplina_id){
            return $query->where('disciplina_id',$disciplina_id);
        }
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
