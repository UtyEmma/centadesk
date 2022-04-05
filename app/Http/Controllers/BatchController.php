<?php

namespace App\Http\Controllers;

use App\Http\Traits\BatchActions;
use App\Library\FileHandler;
use App\Library\Number;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\ForumMessages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\throwException;

class BatchController extends Controller{
    use BatchActions;

    function fetch(Request $request, $batch_id){
        $batch = DB::table('batches')
                    ->where('unique_id', $batch_id)
                    ->join('enrollments', 'batches.unique_id', 'enrollments.batch_id')
                    ->join('users', 'users.unique_id', 'enrollments.student_id')
                    ->get();

        return view('', [
            'batches' => $batch
        ]);
    }

    function fetchBatchStudents(Request $request, $slug, $shortcode){
        try {
            $details = $this->mentorBatchDetails($shortcode, true);
            return response()->view('dashboard.course-details.batch.students', $details);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    function fetchBatch(Request $request, $slug, $shortcode){
        $user = $this->user();

        $batch = Batch::where('short_code', $shortcode)->first();
        $course = Courses::find($batch->course_id);

        $students = DB::table('enrollments')
                            ->where('batch_id', $request->batch_id)
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('users.*')
                            ->get();

        $batches = Courses::find($batch->course_id)->batches;

        return view('dashboard.course-details.batch.overview', [
            'course' => $course,
            'batches' => $batches,
            'batch' => $batch,
            'students' => $students,
            'mentor' => $user
        ]);
    }

    function newBatch(Request $request, $course_id){
        $course = Courses::find($course_id);
        $batch_id = Token::unique('batches');

        $images = FileHandler::upload($request->file('images'));

        $user = $this->user();
        $array = [4, 5, 6];
        $short_code = $request->short_code ?? Token::uniqueText(Arr::random($array), 'batches', 'short_code');

        if($request->discount === 'fixed'){
            $discount_price = $request->fixed;
        }else if($request->discount === 'percent'){
            $discount_price = Number::percentageDecrease($request->percent, $request->price);
        }

        $batch = Batch::create([
            'unique_id' => $batch_id,
            'course_id' => $course_id,
            'duration' => $request->duration,
            'class_link' => $request->class_link,
            'attendees' => $request->attendees,
            'price' => $request->price,
            'current' => true,
            'count' => 1,
            'video' => $request->video,
            'images' => $images,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'title' => $request->title,
            'short_code' => $short_code,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'fixed' => $request->fixed,
            'percent' => $request->percent,
            'time_limit' => $request->time_limit,
            'signup_limit' => $request->signup_limit,
            'currency' => $user->currency,
        ]);

        $course->update([
            'total_batches' => $course->total_batches + 1,
            'active_batch' => $batch->unique_id
        ]);

        $user->total_batches = $user->total_batches + 1;
        $user->save();
    }

}
