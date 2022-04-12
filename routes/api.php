<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('transaction')->group(function(){
    Route::post('initialize', [TransactionsController::class, 'create']);
});

Route::prefix('deposit')->group(function(){
    Route::post('/initiate', [DepositController::class, 'initiate']);
    Route::get('/verify/{reference}', [DepositController::class, 'verify']);
});

Route::get('enroll/{batch_id}/{reference}', [EnrollmentController::class, 'enroll']);

Route::prefix('banks')->group(function(){
    Route::get('/', [TransactionsController::class, 'fetchBanks']);
    Route::post('/verify', [TransactionsController::class, 'verifyBankDetails']);
});
