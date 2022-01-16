<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UsadoController;
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

Route::get('series', [SerieController::class,'index'])->name('series.index');

Route::get('series/{serie}',[SerieController::class,'show'])->name('series.show');

Route::post('series/{serie}/enrolled', [SerieController::class, 'enrolled'])->middleware('auth')->name('serie.enrolled');

Route::get('serie-status/{serie}', SerieStatus::class)->name('series.status')->middleware('auth');

Route::post('webhooks', WebhooksController::class);