<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



/**
 * ADMIN ROUTES
 * Routes dedicated to the admin section
 * */

Route::get('/login', [AdminController::class, 'login']);
Route::post('/login', [AdminController::class, 'authenticate']);


Route::middleware('auth:admin')->group(function(){
    Route::get('/', [AdminController::class, 'home']);
    Route::prefix('/analytics')->group(function(){
        Route::get('/', [AnalyticsController::class, 'all']);
    });

    Route::prefix('/users')->group(function(){
        Route::get('/', [UserController::class, 'all']);
        Route::prefix('/{id}')->group(function(){
            Route::get('/', [UserController::class, 'fetch']);
            Route::get('/edit', [UserController::class, 'edit']);
            Route::get('/courses', [UserController::class, 'courses']);
            Route::get('/students', [UserController::class, 'students']);
            Route::get('/stats', [UserController::class, 'stats']);
            Route::get('/preferences', [UserController::class, 'preferences']);
            Route::get('/withdrawals', [UserController::class, 'withdrawals']);

            Route::prefix('/actions')->group(function(){
                Route::get('/status', [UserController::class, 'status']);
                Route::get('/delete', [UserController::class, 'delete']);
                Route::get('/approve', [MentorController::class, 'approve']);
            });
        });
    });

    Route::get('/countries', [CurrencyController::class, 'getCountries']);
    Route::prefix('/currencies')->group(function(){
        Route::get('/', [CurrencyController::class, 'currencies']);
        Route::get('/set', [CurrencyController::class, 'setCurrencies']);
        Route::get('/update-rates', [CurrencyController::class, 'updateRates']);
        Route::get('/{id}', [CurrencyController::class, 'singleCurrency']);
    });
});
