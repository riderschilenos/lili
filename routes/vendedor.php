<?php

use App\Http\Controllers\Vendedor\DireccionController;
use App\Http\Controllers\Vendedor\PedidoController;
use App\Http\Controllers\Vendedor\HomeController;
use App\Http\Controllers\Vendedor\PagoController;
use Illuminate\Support\Facades\Route;


Route::resource('/', HomeController::class)->names('home');

Route::resource('pedido', PedidoController::class)->names('pedidos');

Route::resource('pago', PagoController::class)->names('pagos');

Route::resource('direccion', DireccionController::class)->names('direccions');

Route::post('{pedido}/close',[PedidoController::class, 'close'])->name('pedido.close');

Route::post('{vendedor}/view',[Homecontroller::class, 'view_update'])->name('view.update');

Route::get('/prepay',[Homecontroller::class, 'prepay'])->name('pedidos.prepay');

Route::delete('{vendedor}/destroy',[Homecontroller::class, 'destroy'])->name('perfil.destroy');

Route::get('/comisiones',[Homecontroller::class, 'comisiones'])->name('pedidos.comisiones');

Route::get('/precios',[Homecontroller::class, 'precios'])->name('pedidos.precios');

Route::get('{pedido}/seguimiento.jpg', [HomeController::class,'download_seguimiento'])->name('foto_seguimiento');






