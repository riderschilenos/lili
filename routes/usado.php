<?php

use App\Http\Controllers\UsadoController;
use Illuminate\Support\Facades\Route;


Route::redirect('', 'usados/vehiculo');

Route::resource('vehiculo', UsadoController::class);