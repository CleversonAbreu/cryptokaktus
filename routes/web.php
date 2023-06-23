<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CryptoController;
use App\Http\Controllers\Admin\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    //dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    //users
    Route::controller(UserController::class)->group(function () {
        Route::get('users/', 'index');
        Route::get('users/create', 'create');
        Route::post('users/', 'store');
        Route::get('users/{user}/edit', 'edit');
        Route::put('users/{user}', 'update');
        Route::get('users/{user_id}/delete', 'destroy');
    });
    //profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile/', 'index');
        Route::put('profile/{user_id}', 'update');
        Route::get('profile/{user_id}/delete', 'destroy');
    });
    //cryptos
    Route::controller(CryptoController::class)->group(function () {
        Route::get('cryptos/', 'index');
        Route::put('cryptos/{user_id}', 'update');
        Route::get('cryptos/{crypto_id}/delete', 'destroy');
    });
});
