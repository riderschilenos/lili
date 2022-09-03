<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    const BORRADOR =1;
    const PAGADA =2;
    const ACTIVA =3;
    const USADA =4;
}
