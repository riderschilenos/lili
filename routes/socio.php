<?php

use App\Http\Controllers\Socio\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('socios', [HomeController::class,'index'])->name('index');

Route::get('{socio}', [HomeController::class,'show'])->name('show');

Route::get('socio/create', [HomeController::class,'create'])->middleware('auth')->name('create');

Route::post('socio/store', [HomeController::class,'store'])->name('store');