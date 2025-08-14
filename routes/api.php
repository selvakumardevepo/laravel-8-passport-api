<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;


// Public routes
Route::post('/register', [LoginRegisterController::class, 'register']);
Route::post('/login', [LoginRegisterController::class, 'login']);

// Protected routes (need Bearer token)
Route::middleware('auth:api')->group(function () {

    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/{id}', 'show');
        Route::get('/products/search/{name}', 'search');
        
        Route::post('/products', 'store');
        Route::post('/products/{id}', 'update');
        Route::delete('/products/{id}', 'destroy');        
    });
});
