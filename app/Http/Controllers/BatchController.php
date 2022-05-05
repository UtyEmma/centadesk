<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBatchRequest;
use App\Http\Traits\BatchActions;
use App\Http\Traits\CourseActions;
use App\Library\FileHandler;
use App\Library\Links;
use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\ForumMessages;
use App\Models\User;
use App\Notifications\NewBatchPublishedNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\throwException;

class BatchController extends Controller{
    use BatchActions, CourseActions;

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
            return Response::view('dashboard.course-details.batch.students', $details);
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

    function newBatchPage(Request $request, $slug){
        $user = $this->user();
        $course = $this->getCourseBySlug($slug, $user);
        return Response::view('dashboard.course-details.new-batch', [
            'mentor' => $user,
            'course' => $course
        ]);
    }

    function newBatch(NewBatchRequest $request, $course_id){
        $course = Courses::find($course_id);
        $batch_id = Token::unique('batches');

        $images = FileHandler::upload($request->file('images'));

        $user = $this->user();

        $short_code = strtolower(Token::text(7, 'batches', 'short_code'));
        $discount_price = 0;

        if($request->discount === 'fixed'){
            $discount_price = $request->fixed;
        }else if($request->discount === 'percent'){
            $discount_price = Number::percentageDecrease($request->percent, $request->price);
        }

        $batch = Batch::create([
            'unique_id' => $batch_id,
            'course_id' => $course_id,
            'mentor_id' => $user->unique_id,
            'duration' => $request->duration,
            'excerpt' => $request->excerpt,
            'objectives' => $request->objectives,
            'class_link' => $request->class_link,
            'access_link' => $request->access_link,
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

        $notification = [
            'subject' => 'You have successfully created a new batch',
            'batch' => $batch,
            'course' => $course
        ];

        try {
            Notification::send($user, new NewBatchPublishedNotification($notification));
        } catch (\Throwable $th) {}

        return Response::redirectBack('success', 'Batch Created Successfully');
    }

    function batchDetails(Request $request, $slug, $shortcode){
        $details = $this->getBatchDetails($shortcode);
        return Response::view('front.batch-details', $details);
    }

    function update(Request $request, $slug, $shortcode){
        try {
            $user = $this->user();

            $batch = Batch::where('short_code', $shortcode)->first();

            $images = FileHandler::upload($request->file('images'));
            FileHandler::deleteFiles(json_decode($batch->images));

            $discount_price = 0;

            if($request->discount === 'fixed'){
                $discount_price = $request->fixed;
            }else if($request->discount === 'percent'){
                $discount_price = Number::percentageDecrease($request->percent, $request->price);
            }

            $batch->update([
                'duration' => $request->duration,
                'class_link' => $request->class_link,
                'access_link' => $request->access_link,
                'attendees' => $request->attendees,
                'price' => $request->price,
                'current' => true,
                'count' => 1,
                'video' => $request->video,
                'images' => $images,
                'startdate' => $request->startdate,
                'enddate' => $request->enddate,
                'title' => $request->title,
                'discount' => $request->discount,
                'discount_price' => $discount_price,
                'fixed' => $request->fixed,
                'percent' => $request->percent,
                'time_limit' => $request->time_limit,
                'signup_limit' => $request->signup_limit,
                'currency' => $user->currency,
            ]);

            return Response::redirectBack("success", "Batch Updated Successfully!");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function edit(Request $request, $slug, $shortcode){
        $details = $this->getBatchDetails($shortcode);
        return Response::view('dashboard.course-details.batch.edit', $details);
    }

    function deleteBatch ($id){

    }

}
