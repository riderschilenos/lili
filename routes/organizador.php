<?php

use App\Http\Controllers\Organizador\EventoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'organizador/eventos')->name('index');

Route::resource('evento', EventoController::class)->names('eventos');

Route::get('evento/{evento}/fechas',[EventoController::class, 'fechas'])->name('eventos.fechas');