<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintingSessionController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AuthCheck;



Route::get('/', function () {
    return view('auth.login');
});



// Auth
//Login
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

// Register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');

Route::middleware([AuthCheck::class])->group(function () {





Route::resource('sessions', PrintingSessionController::class);
Route::get('/sessions', [PrintingSessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/create', [PrintingSessionController::class, 'create'])->name('sessions.create');
Route::post('/sessions', [PrintingSessionController::class, 'store'])->name('sessions.store');


 // Logout
  Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});