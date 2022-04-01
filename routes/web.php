<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [AppController::class, 'index']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('/profile')->group(function(){
        Route::get('/', [StudentController::class, 'show']);
        Route::get('/courses', [StudentController::class, 'enrolledCourses']);
        Route::get('/courses/{slug}', [StudentController::class, 'enrolledCourse']);
        Route::get('/courses/{slug}/forum', [StudentController::class, 'courseForum']);
        Route::post('/forum/send/{batch_id}', [ForumController::class, 'storeMessage']);
        Route::get('/mentors', [StudentController::class, 'fetchMentors']);
    });

    Route::prefix('/reviews')->group(function(){
        Route::post('/submit/{batch_id}', [ReviewController::class, 'submitReview']);
    });

    Route::prefix('/mentor')->group(function(){
        Route::get('/onboarding', [MentorController::class, 'onboarding']);
        Route::post('/create', [MentorController::class, 'store']);
    });

    Route::prefix('/me')->middleware('is.mentor')->group(function(){
        Route::get('/', [MentorController::class, 'home'])->name('dashboard');
        Route::prefix('courses')->group(function(){
            Route::get('/', [CourseController::class, 'fetch']);
            Route::get('/create', [CourseController::class, 'create']);

            Route::middleware('is.approved')->group(function(){
                Route::post('/new', [CourseController::class, 'store']);
                Route::get('/{slug}', [CourseController::class, 'single']);
                Route::get('/{slug}/reviews', [ReviewController::class, 'fetchCourseReviews']);
                Route::prefix('/{slug}/{shortcode}')->group(function(){
                    Route::get('/', [BatchController::class, 'fetchBatch']);
                    Route::get('/students', [BatchController::class, 'fetchBatchStudents']);
                    Route::get('/forum', [ForumController::class, 'show']);
                });
            });
        });
    });
});

Route::prefix('mentor')->group(function(){
    Route::get('/', [MentorController::class, 'index']);
    Route::get('/{slug}', [MentorController::class, 'show']);
});

Route::prefix('classes')->group(function(){
    Route::get('/', [CourseController::class, 'all']);
    Route::get('/{slug}', [CourseController::class, 'show']);
});





require __DIR__.'/auth.php';
