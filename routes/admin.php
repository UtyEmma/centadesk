<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\TestimonialController;
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
            Route::get('/stats', [UserController::class, 'stats']);
            Route::get('/preferences', [UserController::class, 'preferences']);
            Route::get('/withdrawals', [UserController::class, 'withdrawals']);
            Route::get('/payments', [UserController::class, 'payments']);
            Route::get('/enrolled', [UserController::class, 'enrolled']);
            Route::get('/kyc', [UserController::class, 'kyc']);

            Route::prefix('/actions')->group(function(){
                Route::get('/status', [UserController::class, 'status']);
                Route::get('/delete', [UserController::class, 'delete']);
                Route::get('/approve', [MentorController::class, 'approve']);
                Route::get('/verify', [MentorController::class, 'verify']);
                Route::get('/freeze', [UserController::class, 'freezeWallet']);
            });
        });
    });

    Route::prefix('/courses')->group(function(){
        Route::get('/', [CourseController::class, 'courses']);
        Route::prefix('/{slug}')->group(function(){
            Route::get('/', [CourseController::class, 'show']);
            Route::get('/edit', [CourseController::class, 'edit']);
            Route::post('/update', [CourseController::class, 'update']);

            Route::prefix('/{shortcode}')->group(function(){
                Route::get('/', [BatchController::class, 'show']);
                Route::get('/students', [BatchController::class, 'batch_students']);
                Route::get('/forum', [BatchController::class, 'batch_forum']);
                Route::get('/edit', [BatchController::class, 'edit']);
                Route::post('/update', [BatchController::class, 'update']);
            });
        });
    });

    Route::prefix('/mentors')->group(function(){
        Route::get('/', [MentorController::class, 'mentors'])->name('admin.mentors');
        Route::get('/requests', [MentorController::class, 'requests'])->name('admin.mentors.requests');
        Route::get('/verify', [MentorController::class, 'verificationRequests'])->name('admin.mentors.verification_requests');
    });

    Route::get('/countries', [CurrencyController::class, 'getCountries']);

    Route::prefix('/categories')->group(function(){
        Route::get('/', [CategoryController::class, 'fetchAll']);
        Route::post('/create', [CategoryController::class, 'create']);

        Route::prefix('/suggestions')->group(function(){
            Route::get('/', [CategoryController::class, 'suggestions']);
            Route::get('/{id}/update', [CategoryController::class, 'updateSuggestions']);
        });

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

    Route::prefix('/blog')->group(function(){
        Route::get('/', [BlogController::class, 'all']);
        Route::get('/fetch', [BlogController::class, 'createPosts']);
    });

    Route::prefix('/currencies')->group(function(){
        Route::get('/', [CurrencyController::class, 'currencies']);
        Route::get('/set', [CurrencyController::class, 'setCurrencies']);
        Route::get('/update-rates', [CurrencyController::class, 'updateRates']);
        Route::get('/{id}', [CurrencyController::class, 'singleCurrency']);
        Route::post('/update/{id}', [CurrencyController::class, 'updateCurrency']);
        Route::post('/search', [CurrencyController::class, 'searchCurrencies']);
    });

    Route::get('/settings', [SettingsController::class, 'appSettings']);
    Route::post('/update-settings', [SettingsController::class, 'updateSettings']);

    Route::get('/admins', [AdminController::class, 'register']);
    Route::get('/logout', [AdminController::class, 'logout']);

    Route::prefix('/testimonials')->group(function(){
        Route::get('/', [TestimonialController::class, 'index']);
        Route::post('/create', [TestimonialController::class, 'create']);
        Route::prefix('/{id}')->group(function(){
            Route::post('/status', [TestimonialController::class, 'status']);
            Route::post('/edit', [TestimonialController::class, 'update']);
            Route::get('/delete', [TestimonialController::class, 'destroy']);
        });
    });

    Route::prefix('/reports')->group(function(){
        Route::get('/', [ReportController::class, 'viewAllReports'])->name('admin.reports');
        Route::get('/{id}/resolve', [ReportController::class, 'resolve']);

    });

    Route::prefix('/faqs')->group(function(){
        Route::get('/', [FaqController::class, 'all']);
        Route::post('/create', [FaqController::class, 'create']);
        Route::prefix('{id}', function(){
            Route::get('/delete', [FaqController::class, 'delete']);
            Route::get('/status', [FaqController::class, 'status']);
        });
    });

    Route::prefix('/admin')->middleware('is.super')->group(function(){
        Route::post('/create', [AdminController::class, 'create']);
        Route::get('/status', [AdminController::class, 'status']);
        Route::get('/delete', [AdminController::class, 'delete']);
    });

    Route::prefix('/withdrawals')->group(function(){
        Route::get('/', [WithdrawalController::class, 'show']);
        Route::get('/requests', [WithdrawalController::class, 'withdrawalRequests'])->name('admin.withdrawals.requests');
        Route::get('/confirm', [WithdrawalController::class, 'sendFunds']);
        Route::get('/decline', [WithdrawalController::class, 'delineWithdrawal']);
        // Route::get('/update', [WithdrawalController::class, 'sendFunds']);
    });

});

Route::get('*', function(){
    return print_r("Route not found");
});
