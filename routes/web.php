<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('admin.login'));

Route::prefix('admin')->name('admin.')->group(function () {

    // Guests only (admin)
    Route::middleware('guest:admin')->group(function () {
        Route::get('login',    [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('login',   [AdminAuthController::class, 'login'])->name('login.post');

        Route::get('register', [AdminAuthController::class, 'showRegister'])->name('register');
        Route::post('register',[AdminAuthController::class, 'register'])->name('register.post');
    });

    // Authed admin only
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('logout',   [AdminAuthController::class, 'logout'])->name('logout');
    });
});
