<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'garage/vehiculo');

Route::resource('vehiculo', VehiculoController::class)->names('vehiculo');

Route::get('usados', [VehiculoController::class,'index'])->name('usados');