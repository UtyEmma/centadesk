<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBatchRequest;
use App\Http\Traits\BatchActions;
use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Jobs\NewCourseAlert;
use App\Library\Currency;
use App\Library\FileHandler;
use App\Library\Links;
use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\BatchResource;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Notifications\NewBatchPublishedNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response as FacadesResponse;

class BatchController extends Controller{
    use BatchActions, CourseActions, CategoryActions;

    function all(Request $request){
        global $type;
        $user = $this->user();
        $type = 'page';

        if($keyword = $request->keyword){
            $type = 'search';
            $results = Batch::search($keyword)
                            // ->where('startdate', '>', Date::now())
                            ->orderBy('startdate')->paginate(env('PAGINATION_COUNT'));
        }else{
            $query =  Batch::query();

            // $query->where('startdate', '>', Date::now());

            $query->with(['mentor', 'course', 'enrollments.student'])
                        ->withCount('enrollments');

            $query->when($request->category, function($query, $category){
                return $query->where('category', $category);
            });

            $query->when($request->order === 'students', function ($query) {
                return $query->orderBy('total_students', 'desc');
            });

            $query->when($request->price === 'free', function ($query) {
                return $query->where('price', 0);
            });

            $query->when($request->price === 'paid', function ($query) {
                return $query->where('price', '>', 0);
            });

            $query->orderBy('startdate', 'desc');

            $results = $query->paginate(env('PAGINATION_COUNT'));
        }

        // dd($results);

        return view('front.batches', [
            'batches' => $results,
            'data' => $this->app_data(),
            'type' => $type,
            'user' => $this->user()
        ]);
    }

    function batchDetailsByShortcode(Request $request, $shortcode){
        try {
            if(!Batch::where('short_code', $shortcode)->first()) return Response::view('errors.404');
            $details = $this->getBatchDetails($shortcode);
            return Response::view('front.batch-details', $details);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

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
        try {
            $user = $this->user();
            $details = $this->mentorBatchDetails($shortcode, true);
            return view('dashboard.course-details.batch.overview', $details);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function newBatchPage(Request $request, $slug){
        try {
            $user = $this->user();
            $course = $this->getCourseBySlug($slug, $user);
            return Response::view('dashboard.course-details.new-batch', [
                'mentor' => $user,
                'course' => $course
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function newBatch(NewBatchRequest $request, $course_id){
        $course = Courses::find($course_id);
        $batch_id = Token::unique('batches');

        $images = FileHandler::upload($request->file('images'));

        $user = $this->user();

        $short_code = strtolower(Token::text(7, 'batches', 'short_code'));

        $discount_price = 0;
        $price = Currency::convertUserCurrencyToDefault($request->price);

        if($request->discount === 'fixed'){
            $discount_price = Currency::convertUserCurrencyToDefault($request->fixed);
        }else if($request->discount === 'percent'){
            $discount_price = Number::percentageDecrease($request->percent, $price);
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
            'price' => $price,
            'current' => true,
            'count' => 1,
            'desc' => $request->desc,
            'video' => $request->video,
            'certificates' => $request->certificates === 'on' ? true : false,
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

        $user->total_batches += 1;
        $user->save();

        $notification = [
            'subject' => 'You have successfully created a new batch',
            'batch' => $batch,
            'course' => $course
        ];

        NewCourseAlert::dispatch($course);

        try {
            Notification::send($user, new NewBatchPublishedNotification($notification));
        } catch (\Throwable $th) {}


        return Response::redirect("/me/courses/$course->slug/$batch->short_code", 'success', 'Batch Created Successfully');
    }

    function batchDetails(Request $request, $slug, $shortcode){
        try {
            $details = $this->getBatchDetails($shortcode);
            return Response::view('front.batch-details', $details);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
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

    function deleteBatch ($slug, $short_code){
        if(!$batch = Batch::where('short_code', $short_code)->first())
                return Response::redirectBack('error', 'The requested batch was not found');
        $user = $this->user();
        if($batch->mentor_id !== $user->unique_id)
                return Response::redirectBack('error', 'This batch does not belong to the logged in user');
        if($this->isOngoing($batch))
                return Response::redirectBack('error', 'You cannot delete this batch because it is Ongoing. You can delete it when its done!');

        if($this->isUpcoming($batch)) {
            $enrollments = Enrollment::where('batch_id', $batch->unique_id)->get();
            if($enrollments->isNotEmpty()) return Response::redirectBack('error', 'You cannot delete this batch until it is completed');
        }

        if(!$batch->payable) return Response::redirectBack('error', 'You cannot delete this batch because it has a pending issue.');

        $batch->delete();
        $course = Courses::find($batch->course_id);

        return Response::redirect("/courses/$course->slug", 'success', 'You have successfully deleted this batch!');
    }

    function batchRecourses($slug, $shortcode){
        $details = $this->getBatchDetails($shortcode);
        // $batch = Batch::where('short_code', $shortcode)->first();
        $resources = BatchResource::where('batch_id', $details['batch']->unique_id)->get();
        return Response::view('dashboard.course-details.batch.resources', array_merge($details, ['resources' => $resources]));
    }

}
