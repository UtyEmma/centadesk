<?php

namespace App\Http\Controllers;

use App\Library\Token;
use App\Models\Batch;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller{

    function submitReview(Request $request, $batch_id){
        try {
            $user = $this->user();
            $unique_id = Token::unique('reviews');
            $batch = Batch::findOrFail($batch_id);

            Review::create([
                'unique_id' => $unique_id,
                'user_id' => $user->unique_id,
                'course_id' => $batch->course_id,
                'batch_id' => $batch->unique_id,
                'rating' => $request->rating,
                'review' => $request->review
            ]);

            return redirect()->back()->with('success', "Your Review has been submitted");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
