<?php

namespace App\Http\Traits;

use App\Models\Review;
use Illuminate\Support\Facades\Date;

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
        $reviews = Review::where($model_id, $value)->get();
        return floor($reviews->sum('rating') / $reviews->count());
    }

    function checkIfUserCanReview($user_id, $batch){
        $user_review = Review::where('user_id', $user_id)->where('course_id', $batch->course_id)->first();
        $batch_status = Date::parse($batch->startdate)->greaterThan(Date::now());
        if($user_review) return ['status' => false, 'message' => 'You have already reviewed this batch!'];
        if($batch_status) return ['status' => false, 'message' => 'You can only review this class after it has started!'];
        return  ['status' => true, 'message' => 'Please write your review for this batch!'];;
    }

}
