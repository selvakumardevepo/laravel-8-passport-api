<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::middleware('auth:web')->group(function(){
        //Route::get('/', function () {return view('dashboard');})->name('welcome');

        Route::get('/', [UserAuthController::class, 'redirect'])->name('welcome');
        Route::get('/dashboard/user', function(){return view('dashboard_customer');})->name('dashboard-user');
        // Route::get('/dashboard/admin', function(){return view('dashboard_admin');})->name('dashboard-admin');
        Route::get('/dashboard/admin', [UserAuthController::class, 'adminDashboard'])->name('dashboard-admin');


        // Logout
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    });


    // Guest routes
    Route::middleware('guest:web')->group(function () {
        Route::get('/notice', function () {return view('notice');})->name('notice');
        Route::get('/login', function(){return view('login');})->name('login');
        Route::post('/login', [UserAuthController::class, 'login'])->name('student.login');
    });
