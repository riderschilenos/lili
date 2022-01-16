<?php

use App\Http\Controllers\Vendedor\DireccionController;
use App\Http\Controllers\Vendedor\PedidoController;
use App\Http\Controllers\Vendedor\HomeController;
use Illuminate\Support\Facades\Route;


Route::resource('/', HomeController::class)->names('home');

Route::resource('pedido', PedidoController::class)->names('pedidos');

Route::resource('direccion', DireccionController::class)->names('direccions');

