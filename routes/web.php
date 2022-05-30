<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BatchResourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CryptoPaymentController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawalController;
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

Route::middleware(['set.currency', 'set.referrals'])->group(function(){
    Route::get('/', [AppController::class, 'index']);
    Route::get('/about', [AppController::class, 'about']);
    Route::get('/contact', [AppController::class, 'contact']);
    Route::post('/currency/update', [SettingsController::class, 'updateCurrency']);

    Route::middleware('auth')->group(function(){

        Route::get('/onboarding', [StudentController::class, 'onboarding']);

        Route::prefix('categories')->group(function(){
            Route::post('/update', [StudentController::class, 'updateCategories']);
        });

        Route::middleware('is.onboarded')->group(function(){
            Route::prefix('learning')->group(function(){
                Route::get('/', [StudentController::class, 'overview']);

                Route::prefix('courses')->group(function(){

                    Route::get('/', [StudentController::class, 'enrolledCourses']);

                    Route::prefix('{slug}')->group(function(){
                        Route::prefix('{shortcode}')->group(function(){
                            Route::get('/', [StudentController::class, 'enrolledCourse'])->name('enrolledBatchRoute');
                            Route::get('forum', [StudentController::class, 'courseForum']);
                            Route::get('resources', [StudentController::class, 'courseResources']);
                            Route::get('certificate', [EnrollmentController::class, 'downloadCertificate']);
                            Route::get('view-certificate', [EnrollmentController::class, 'viewCertificate']);
                        });
                    });
                });
            });


            Route::prefix('wallet')->group(function(){
                Route::get('/', [WalletController::class, 'studentWallet']);
                Route::post('/deposit', [DepositController::class, 'initiate'])->middleware('user.status');
                Route::get('/verify', [DepositController::class, 'verify'])->middleware('user.status');
            });


            Route::prefix('/profile')->group(function(){
                Route::get('/', [StudentController::class, 'show']);
                Route::post('/update', [StudentController::class, 'update'])->middleware('user.status');
                Route::prefix('/reviews')->middleware('user.status')->group(function(){
                    Route::post('/submit/{batch_id}', [ReviewController::class, 'submitReview']);
                });
            });

            Route::prefix('reports')->middleware('user.status')->group(function(){
                Route::post('/create/{batch_id}', [ReportController::class, 'create']);
                Route::get('/resolve/{batch_id}', [ReportController::class, 'resolve']);
            });
        });

        Route::prefix('/transaction')->group(function(){
            Route::get('/verify', [TransactionsController::class, 'verify']);
        });

        Route::prefix('/enroll')->middleware('user.status')->group(function(){
            Route::post('/{batch_id}', [EnrollmentController::class, 'initiate']);
            Route::get('/complete/{type}/{batch_id}', [EnrollmentController::class, 'complete']);
        });

        Route::prefix('/mentor')->middleware('user.status')->group(function(){
            Route::get('/onboarding', [MentorController::class, 'onboarding']);
            Route::get('/join', [MentorController::class, 'mentorInfo']);
            Route::post('/create', [MentorController::class, 'store']);
        });

        Route::prefix('/me')->middleware('is.mentor')->group(function(){
            Route::get('/', [MentorController::class, 'home'])->name('dashboard');

            Route::prefix('/category')->group(function(){
                Route::post('/suggest', [CategoryController::class, 'suggestCategory']);
            });

            Route::prefix('courses')->group(function(){
                Route::get('/', [CourseController::class, 'fetch']);
                Route::get('/create', [CourseController::class, 'create'])->middleware('user.status');

                Route::middleware(['is.approved', 'user.status'])->group(function(){
                    Route::post('/new', [CourseController::class, 'store']);
                    Route::get('/{slug}', [CourseController::class, 'single']);
                    Route::get('/{slug}/reviews', [ReviewController::class, 'fetchCourseReviews']);
                    Route::get('/{slug}/edit', [CourseController::class, 'edit']);
                    Route::post('/{slug}/update', [CourseController::class, 'update']);

                    Route::prefix('/{slug}/batch')->group(function(){
                        Route::get('/new', [BatchController::class, 'newBatchPage']);
                        Route::post('/create', [BatchController::class, 'newBatch']);
                    });

                    Route::prefix('/{slug}/{shortcode}')->group(function(){
                        Route::get('/', [BatchController::class, 'fetchBatch'])->name('mentor_batch');
                        Route::get('/students', [BatchController::class, 'fetchBatchStudents'])->name('mentor_batch_students');
                        Route::get('/forum', [ForumController::class, 'fetchMentorBatchForum'])->name('mentor_batch_forum');

                        Route::prefix('/resources')->group(function(){
                            Route::get('/', [BatchController::class, 'batchRecourses'])->name('mentor_batch_resources');
                            Route::post('/create', [BatchResourceController::class, 'create'])->name('create_batch_resources');

                            Route::prefix('/{resource_id}')->group(function(){
                                Route::post('edit' , [BatchResourceController::class, 'edit']);
                                Route::get('delete' , [BatchResourceController::class, 'delete']);
                            });
                        });
                        Route::get('/edit', [BatchController::class, 'edit'])->name('mentor_batch_edit');
                        Route::post('/update', [BatchController::class, 'update']);
                        Route::post('/delete', [BatchController::class, 'deleteBatch']);
                    });
                });
            });

            Route::middleware(['is.approved', 'user.status'])->group(function(){
                Route::get('/verify', [MentorController::class, 'requestVerification']);
            });

            Route::prefix('account')->group(function(){
                Route::get('/', [MentorController::class, 'profile']);
                Route::get('/security', [MentorController::class, 'security']);
                Route::get('/payments', [MentorController::class, 'payments']);
                Route::get('/update', [MentorController::class, 'update']);
                Route::get('/delete', [MentorController::class, 'delete']);
            });

            Route::prefix('/wallet')->group(function(){
                Route::get('/', [WalletController::class, 'mentorWallet']);
                Route::post('/withdraw', [WithdrawalController::class, 'initiate'])->middleware('user.status');
            });
        });
    });

    Route::prefix('/mentors')->group(function(){
        Route::get('/', [MentorController::class, 'index']);
        Route::get('/{username}', [MentorController::class, 'show']);
    });

    Route::prefix('/courses')->group(function(){
        Route::get('/', [CourseController::class, 'all']);
        Route::get('/{slug}', [CourseController::class, 'show']);
        Route::get('/{slug}/{shortcode}', [BatchController::class, 'batchDetails']);
    });

    Route::get('/sessions', [BatchController::class, 'all']);


    Route::get('/about', [AppController::class, 'about']);
    Route::get('/contact', [AppController::class, 'contact']);

    Route::post('/contact/send', [ContactController::class, 'sendContactMessage']);
    Route::get('/terms', [AppController::class, 'terms']);
    Route::get('/privacy-policy', [AppController::class, 'privacyPolicy']);
    Route::get('/faqs', [AppController::class, 'faqs']);
    Route::get('/disclaimer', [AppController::class, 'disclaimer']);

    require __DIR__.'/auth.php';

    Route::get('/{shortcode}', [BatchController::class, 'batchDetailsByShortcode']);

});

