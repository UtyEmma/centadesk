<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\SettingsController;
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
                Route::get('/verify', [MentorController::class, 'verify']);

            });


        });
    });

    Route::prefix('/courses')->group(function(){
        Route::get('/', [CourseController::class, 'courses']);
        Route::prefix('/{id}')->group(function(){
            Route::get('/', [CourseController::class, 'show']);
            Route::prefix('/{shortcode}')->group(function(){
                Route::get('/', [BatchController::class, 'show']);
            });
        });
    });

    Route::prefix('/mentors')->group(function(){
        Route::get('/', [MentorController::class, 'mentors']);
    });

    Route::get('/countries', [CurrencyController::class, 'getCountries']);

    Route::prefix('/categories')->group(function(){
        Route::get('/', [CategoryController::class, 'fetchAll']);
        Route::post('/create', [CategoryController::class, 'create']);
        Route::prefix('{category_id}')->group(function(){
            Route::post('/update', [CategoryController::class, 'update']);
            Route::get('/status', [CategoryController::class, 'setStatus']);
            Route::get('/delete', [CategoryController::class, 'delete']);
        });
    });

    Route::prefix('/banks')->group(function(){
        Route::get('/', [BanksController::class, 'show']);
        Route::get('/refresh', [BanksController::class, 'refresh']);
    });

    Route::prefix('/currencies')->group(function(){
        Route::get('/', [CurrencyController::class, 'currencies']);
        Route::get('/set', [CurrencyController::class, 'setCurrencies']);
        Route::get('/update-rates', [CurrencyController::class, 'updateRates']);
        Route::get('/{id}', [CurrencyController::class, 'singleCurrency']);
    });

    Route::get('/app-settings', [SettingsController::class, 'appSettings']);
    Route::post('/update-settings', [SettingsController::class, 'updateSettings']);

    Route::get('/logout', [AdminController::class, 'logout']);

    Route::get('*', function(){
        return print_r("Route not found");
    });
});
