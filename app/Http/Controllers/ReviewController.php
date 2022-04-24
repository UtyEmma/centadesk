<?php

namespace App\Http\Controllers;

use App\Http\Traits\BatchActions;
use App\Http\Traits\ReviewActions;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    use ReviewActions, BatchActions;

    function submitReview(Request $request, $batch_id){
        try {
            $user = $this->user();
            $unique_id = Token::unique('reviews');
            $batch = Batch::findOrFail($batch_id);
            $course = Courses::findOrFail($batch->course_id);
            $mentor = User::findOrFail($course->mentor_id);

            Review::create([
                'unique_id' => $unique_id,
                'user_id' => $user->unique_id,
                'course_id' => $batch->course_id,
                'batch_id' => $batch->unique_id,
                'rating' => $request->rating,
                'review' => $request->review
            ]);

            $course->rating = $this->calculateRatings('course_id', $course->unique_id);
            ++$course->reviews;
            $course->save();

            $mentor->avg_rating = $this->calculateRatings('mentor_id', $mentor->unique_id);
            ++$mentor->total_reviews;
            $mentor->save();

            return Response::redirectBack('success', "Your Review has been submitted");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function fetchCourseReviews(Request $request, $slug){
        try {
            $user = $this->user();

            $course = Courses::where([
                'slug' => $slug,
                'mentor_id' => $user->unique_id
            ])->first();

            if(!$course) throw new Exception("The course was not found", 404);

            $batches = Courses::find($course->unique_id)->batches;

            return Response::view('dashboard.course-details.reviews', [
                'course' => $course,
                'mentor' => $user,
                'batches' => $batches
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function fetchBatchReviews(Request $request, $slug, $shortcode){
        try {
            $user = $this->user();
            if(!Batch::where([
                'short_code' => $shortcode,
                'mentor_id' => $user->unique_id
                ])->get()) return Response::redirectBack('error', 'The requested batch does not exist');

            $batchDetails = $this->mentorBatchDetails($shortcode);
            return Response::view('dashboard.course-details.batch.reviews', $batchDetails);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function fetchMentorReviews(Request $request){

    }

}
