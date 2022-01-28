<?php


use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'garage/usados');

Route::get('usados', [VehiculoController::class,'index'])->name('usados');

Route::get('vehiculo/vender', [VehiculoController::class,'vender'])->middleware('auth')->name('vehiculo.vender');

Route::get('{vehiculo}/fotos', [VehiculoController::class,'imageupload'])->name('image');

Route::get('{vehiculo}/comision', [VehiculoController::class,'comision'])->name('comision');

Route::put('{vehiculo}/precio', [VehiculoController::class,'precio'])->name('precioupdate');

Route::get('misvehiculos', [VehiculoController::class,'personalindex'])->middleware('auth')->name('vehiculos.index');


Route::get('{vehiculo}', [VehiculoController::class,'show'])->name('vehiculo.show');


Route::post('vehiculo/store', [VehiculoController::class,'store'])->name('vehiculo.store');


Route::get('vehiculo/create', [VehiculoController::class,'create'])->middleware('auth')->name('vehiculo.create');

