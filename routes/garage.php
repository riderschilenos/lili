<?php


use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::post('{vehiculo}/publicar', [VehiculoController::class,'publicar'])->name('publicar');

Route::post('{vehiculo}/inscribir', [VehiculoController::class,'inscribir'])->name('inscribir');

Route::redirect('', 'garage/usados');

Route::get('usados', [VehiculoController::class,'index'])->name('usados');

Route::get('vehiculo/vender', [VehiculoController::class,'vender'])->middleware('auth')->name('vehiculo.vender');

Route::get('{vehiculo}/fotos', [VehiculoController::class,'imageupload'])->name('image');

Route::post('{vehiculo}/upload', [VehiculoController::class,'upload'])->name('upload');

Route::get('{vehiculo}/comision', [VehiculoController::class,'comision'])->name('comision');

Route::get('{vehiculo}/inscripcion', [VehiculoController::class,'pagoinscripcion'])->name('inscripcion');

Route::put('{vehiculo}/precio', [VehiculoController::class,'precio'])->name('precioupdate');


Route::get('misvehiculos', [VehiculoController::class,'personalindex'])->middleware('auth')->name('vehiculos.index');


Route::get('{vehiculo}', [VehiculoController::class,'show'])->name('vehiculo.show');


Route::post('vehiculo/store', [VehiculoController::class,'store'])->name('vehiculo.store');


Route::get('vehiculo/create', [VehiculoController::class,'create'])->middleware('auth')->name('vehiculo.create');

