<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrregister extends Model
{
    use HasFactory;

    const BORRADOR =1;
    const DISEÑADO =2;
    const IMPRESO =3;
    const CONSIGNACION =4;
    const VENDIDO =5;
    

    
}
