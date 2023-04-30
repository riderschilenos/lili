<?php

use App\Http\Controllers\Ticket\EventoController;
use App\Http\Controllers\Ticket\FechacategoriaController;
use App\Http\Controllers\Ticket\InscripcionController;
use Illuminate\Support\Facades\Route;

Route::get('eventos', [EventoController::class,'index'])->name('evento.index');

Route::get('eventos/{evento}',[EventoController::class,'show'])->name('evento.show');

Route::get('pistas',[EventoController::class,'pistas'])->name('pistas.index');

Route::get('ticket/create/{evento}',[EventoController::class,'preticket'])->name('evento.preticket')->middleware('auth');

Route::resource('inscripcion', InscripcionController::class)->names('inscripcions');

Route::get('pistas/create',[EventoController::class, 'pista_create'])->name('pistas.create');
