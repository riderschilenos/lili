<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('{serie}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{serie}/aproved', [PaymentController::class, 'serie'])->name('serie');