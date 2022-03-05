<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('{serie}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{serie}/aproved', [PaymentController::class, 'serie'])->name('serie');

Route::get('{socio}/active', [PaymentController::class, 'socio'])->name('socio');

Route::get('{vehiculo}/publicar', [PaymentController::class, 'vehiculo'])->name('vehiculo');

Route::get('{vehiculo}/inscribir', [PaymentController::class, 'vehiculoinsc'])->name('vehiculo.inscribir');

Route::get('{pago}/active', [PaymentController::class, 'pago'])->name('pago.active');

Route::get('{vehiculo}/bajar', [PaymentController::class, 'vehiculodown'])->name('vehiculodown');