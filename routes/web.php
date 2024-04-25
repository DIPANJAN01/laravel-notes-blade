<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(('auth'))->group((function () {

    Route::resource('notes', NoteController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
}));


Route::middleware([AuthCheck::class])->group((function () {

    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
}));
