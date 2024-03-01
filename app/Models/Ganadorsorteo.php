<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganadorsorteo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function inscripcion(){
        return $this->belongsTo('App\Models\Inscripcion');
    }
    
    public function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }
    
}
