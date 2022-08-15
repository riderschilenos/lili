<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('{serie}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('ticket/{evento}', [PaymentController::class, 'checkoutevento'])->name('checkout.evento');

Route::get('{serie}/aproved', [PaymentController::class, 'serie'])->name('serie');

Route::get('{evento}/aproved', [PaymentController::class, 'evento'])->name('evento');

Route::get('{pago}/activepago', [PaymentController::class, 'pago'])->name('pago');

Route::get('{socio}/active', [PaymentController::class, 'socio'])->name('socio');

Route::get('{vendedor}/active', [PaymentController::class, 'vendedor'])->name('vendedor');

Route::get('{vehiculo}/publicar', [PaymentController::class, 'vehiculo'])->name('vehiculo');

Route::get('{vehiculo}/inscribir', [PaymentController::class, 'vehiculoinsc'])->name('vehiculo.inscribir');

Route::get('{vehiculo}/bajar', [PaymentController::class, 'vehiculodown'])->name('vehiculodown');