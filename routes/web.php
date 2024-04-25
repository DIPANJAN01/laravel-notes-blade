<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('notes.index');
});



Route::middleware(('auth'))->group((function () {

    Route::resource('notes', NoteController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user', [UserController::class, 'destroy'])->name('user.destroy');
}));


// Route::middleware(('guest'))->group(function () {});

Route::middleware([GuestCheck::class])->group((function () {

    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
}));
