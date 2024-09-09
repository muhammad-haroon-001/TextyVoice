<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\HashController;

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('admin/hash/{hash}', [HashController::class, 'index'])
        ->name('admin.hash')
        ->middleware('check.admin.hash');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');


    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
