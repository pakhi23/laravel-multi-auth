<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\AgentAuthController;

use Illuminate\Support\Facades\Route;

// Admin routes
Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout']);
    });
});

// Agent routes
Route::prefix('agent')->group(function () {
    Route::post('/login', [AgentAuthController::class, 'login']);
    Route::middleware('agent')->group(function () {
        Route::post('/logout', [AgentAuthController::class, 'logout']);
    });
});