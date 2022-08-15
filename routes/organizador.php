<?php

use App\Http\Controllers\Organizador\CategoriaController;
use App\Http\Controllers\Organizador\EventoController;
use App\Http\Controllers\Organizador\FechaController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'organizador/eventos')->name('index');

Route::resource('evento', EventoController::class)->names('eventos');

Route::get('evento/{evento}/fechas',[EventoController::class, 'fechas'])->name('eventos.fechas');

Route::resource('fecha', FechaController::class)->names('fechas');

Route::resource('categoria', CategoriaController::class)->names('categorias');