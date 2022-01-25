<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'garage/vehiculo');

Route::get('usados', [VehiculoController::class,'index'])->name('usados');

Route::get('vehiculo', [VehiculoController::class,'index'])->name('vehiculo.index');

Route::get('vehiculo/create', [VehiculoController::class,'create'])->middleware('auth')->name('vehiculo.create');

Route::get('{vehiculo}', [VehiculoController::class,'show'])->name('vehiculo.show');

Route::post('vehiculo/store', [HomeController::class,'store'])->name('vehiculo.store');

