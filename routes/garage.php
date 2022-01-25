<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'garage/usados');

Route::get('usados', [VehiculoController::class,'index'])->name('usados');

Route::get('misvehiculos', [VehiculoController::class,'personalindex'])->name('vehiculos.index');

Route::get('vehiculo/create', [VehiculoController::class,'create'])->middleware('auth')->name('vehiculo.create');

Route::get('vehiculo/vender', [VehiculoController::class,'vender'])->middleware('auth')->name('vehiculo.vender');

Route::get('{vehiculo}', [VehiculoController::class,'show'])->name('vehiculo.show');

Route::post('vehiculo/store', [VehiculoController::class,'store'])->name('vehiculo.store');

