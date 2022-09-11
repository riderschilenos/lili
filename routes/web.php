<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsadoController;
use App\Http\Controllers\Vendedor\HomeController as VendedorHomeController;
use App\Http\Controllers\Vendedor\PedidoController;
use App\Http\Controllers\WebhooksController;
use Illuminate\Support\Facades\Auth;

use App\Http\Livewire\SerieStatus;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('content', [SerieController::class,'index'])->name('series.index');

Route::get('vendedores', [VendedorHomeController::class,'index'])->name('vendedores.index');

Route::get('content/{serie}',[SerieController::class,'show'])->name('series.show');

Route::get('seguimiento/{pedido}',[PedidoController::class,'seguimiento'])->name('pedido.seguimiento');

Route::post('content/{serie}/enrolled', [SerieController::class, 'enrolled'])->middleware('auth')->name('serie.enrolled');

Route::post('evento/{evento}/enrolled', [SerieController::class, 'enrolled'])->middleware('auth')->name('evento.enrolled');

Route::get('serie-status/{serie}', SerieStatus::class)->name('series.status')->middleware('auth');

Route::post('webhooks', WebhooksController::class);

Route::get('ticket/{evento}', [PaymentController::class, 'checkoutevento'])->name('checkout.evento')->middleware('auth');

Route::get('/catalogos',[VendedorHomeController::class, 'catalogoscarcasas'])->name('catalogo.carcasas');