<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MentorController;
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

Route::get('/', function () {
    return view('front.index');
});


Route::prefix('classes')->group(function(){
    Route::get('/', [CourseController::class, 'all']);
    Route::get('/{slug}', [CourseController::class, 'show']);
});

Route::prefix('mentor')->group(function(){
    Route::get('/', [MentorController::class, 'index']);
    Route::get('/{slug}', [MentorController::class, 'show']);
});


Route::middleware(['auth'])->group(function(){
    Route::prefix('/profile')->group(function(){
        Route::get('/courses', [StudentController::class, 'enrolledCourses']);
        Route::get('/courses/{slug}', [StudentController::class, 'enrolledCourse']);
        Route::get('/mentors', [StudentController::class, 'fetchMentors']);
    });

    Route::prefix('classes')->group(function(){
        Route::get('/{slug}/enroll', [CourseController::class, 'enroll']);
    });

    Route::prefix('mentor')->group(function(){
        Route::get('/onboarding', [MentorController::class, 'mentorSignup']);
        Route::post('/create', [MentorController::class, 'store']);
    });

    Route::prefix('/me')->middleware('is.mentor')->group(function(){
        Route::get('/', [UserController::class, 'home'])->name('dashboard');
        Route::prefix('courses')->group(function(){
            Route::get('/', [CourseController::class, 'fetch']);
            Route::get('/{slug}', [CourseController::class, 'single']);
            Route::get('/create', [CourseController::class, 'create']);
            Route::post('/new', [CourseController::class, 'store']);
            Route::prefix('/{slug}/{batch_id}')->group(function(){
                Route::get('/', [CourseController::class, 'fetchStudents']);
                Route::get('/forum', [ForumController::class, 'show']);
            });
        });
    });
});

require __DIR__.'/auth.php';
