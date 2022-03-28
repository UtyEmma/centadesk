<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;



/**
 * ADMIN ROUTES
 * Routes dedicated to the admin section
 * */

Route::domain("admin.localhost")->group(function(){
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'authenticate']);


    Route::middleware('auth:admin')->group(function(){
        Route::get('/', [AdminController::class, 'home']);
    });
});
