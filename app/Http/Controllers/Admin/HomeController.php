<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use App\Models\Pago;
use App\Models\Retiro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){

      $gastos = Gasto::where('estado',1)->where('created_at', '<=', Carbon::now()."+ 1 month")->get();

      $retiros = Retiro::where('estado',1)->where('created_at', '<=', Carbon::now()."+ 1 month")->get();

      $fecha=Carbon::now()."+ 1 month";

      $pagos = Pago::where('estado',1)->paginate(80);

      return view('admin.index',compact('gastos','retiros','pagos','fecha'));
   }
}
