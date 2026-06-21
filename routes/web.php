<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeatController;

Route::get('/', [BeatController::class, 'index'])->name('catalog.index');
Route::get('/beat/{beat}', [BeatController::class, 'show'])->name('catalog.show');
