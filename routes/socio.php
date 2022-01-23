<?php

use App\Http\Controllers\Socio\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('socios', [HomeController::class,'index'])->name('index');

Route::get('{socio}', [HomeController::class,'show'])->name('show');

Route::get('socio/suscripcion', [HomeController::class,'create'])->middleware('auth')->name('create');

Route::post('socio/store', [HomeController::class,'store'])->name('store');

Route::get('socio/{socio}/edit', [HomeController::class,'edit'])->name('edit');

Route::put('socio/{socio}/update', [HomeController::class,'update'])->name('update');