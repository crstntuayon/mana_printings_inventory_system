<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintingSessionController;



Route::get('/', function () {
    return view('/sessions');
});



Route::resource('sessions', PrintingSessionController::class);
Route::get('/sessions', [PrintingSessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/create', [PrintingSessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [PrintingSessionController::class, 'store'])->name('sessions.store');
