<?php

use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

//роуты для контроллера пользователей
Route::withoutMiddleware(ValidateCsrfToken::class)->group(function () {
    Route::apiResource('users', UserController::class);
    Route::post('users', [UserController::class, 'create'])->name('users.create');
});

