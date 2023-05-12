<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    const CERRADA =0;
    const BORRADOR =1;
    const PAGADA =2;
    const ACTIVA =3;
    const USADA =4;


    public function fecha_categoria(){
        return $this->belongsTo('App\Models\Fecha_categoria');
    }

    public function fecha(){
        return $this->belongsTo('App\Models\Fecha');
    }

    //relacion uno a muchos inversa 

   public function ticket(){
    return $this->belongsTo('App\Models\Ticket');
    }
    

}
