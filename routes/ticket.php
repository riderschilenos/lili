<?php

use App\Http\Controllers\Ticket\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('eventos', [EventoController::class,'index'])->name('evento.index');