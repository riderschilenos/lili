<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Filmmaker\SerieController;
use App\Http\Livewire\Filmmaker\SeriesSponsors;
use App\Http\Livewire\Filmmaker\SeriesVideos;



Route::resource('serie', SerieController::class)->middleware('can:Actualizar series')->names('series');

//Route::get('serie/{serie}/videos',App\Http\Livewire\Filmmaker\SeriesVideos::class)->name('series.videos');

//Route::get('serie/{serie}/sponsors',App\Http\Livewire\Filmmaker\SeriesSponsors::class)->middleware('can:Actualizar series')->name('series.sponsors');

Route::post('serie/{serie}/status',[SerieController::class, 'status'])->name('series.status');

Route::get('serie/{serie}/observation',[SerieController::class, 'observation'])->name('series.observation');