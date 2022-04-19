<?php

namespace App\Http\Traits;

use App\Models\Review;

trait ReviewActions {

    function getCourseReviews($course){
        return Review::where('course_id', $course->unique_id)
                        ->join('users', 'users.unique_id', 'reviews.user_id')
                        ->select('reviews.*', 'users.firstname', 'users.lastname', 'users.role', 'users.avatar')
                        ->get();
    }

    function getBatchReviews($batch){
        return Review::where('batch_id', $batch->unique_id)
                        ->join('users', 'users.unique_id', 'reviews.user_id')
                        ->select('reviews.*', 'users.firstname', 'users.lastname', 'users.role', 'users.avatar')
                        ->get();
    }

    function calculateRatings($model_id, $value){
        $ratings = Review::select('rating')->where($model_id, $value)->get();
        return $ratings->sum() / $ratings->count();
    }

}
