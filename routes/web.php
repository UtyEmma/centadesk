<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.index');
});

Route::prefix('/courses')->group(function(){
    Route::get('/', [CourseController::class, 'index']);
    Route::get('/{slug}', [CourseController::class, 'show']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
    Route::get('/onboarding', [MentorController::class, 'create']);

    Route::prefix('/profile')->group(function(){
        Route::get('/courses', [CourseController::class, 'studentCourses']);
    });

});

require __DIR__.'/auth.php';
