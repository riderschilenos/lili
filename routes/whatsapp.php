<?php

use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

Route::post('enviar/invitacion', [WhatsappController::class,'invitacion'])->name('invitacion.store');

Route::post('recibir/data', [WhatsappController::class,'webhook'])->name('recibir.data');

