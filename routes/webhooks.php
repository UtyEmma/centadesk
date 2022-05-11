<?php

use App\Http\Controllers\CryptoPaymentController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;


Route::prefix('/bank')->group(function(){
    Route::post('/withdrawal/status', [WithdrawalController::class, 'updateStatus']);
});

Route::prefix('/crypto')->group(function(){
    Route::prefix('status')->group(function(){
        Route::post('/payment', [CryptoPaymentController::class, 'updatePaymentStatus']);
        Route::post('/withdrawal', [CryptoPaymentController::class, 'updateWithdrawalStatus']);
    });
});
