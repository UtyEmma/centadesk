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
                            ->where('startdate', '>', Date::now())
                            ->orderBy('startdate')->paginate(env('PAGINATION_COUNT'));
        }else{
            $query =  Batch::query();

            // $query->where('startdate', '>', Date::now());

            $query->with(['mentor', 'course', 'enrollments.student', 'reviews'])
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

        return view('front.batches', [
            'batches' => $results,
            'data' => $this->app_data(),
            'type' => $type,
            'user' => $this->user(),
            'categories' => $this->getActiveCategories()
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
            $categories = $this->getAllCategories();
            return Response::view('dashboard.course-details.new-batch', [
                'mentor' => $user,
                'course' => $course,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
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
            $user = $this->user();

            $batch = Batch::where('short_code', $shortcode)->first();

            $image = $request->hasFile('images') ? FileHandler::updateFile($request->file('images'), $batch->images) : $batch->images;

            $discount_price = $batch->discount_price;
            $price = Currency::convertUserCurrencyToDefault($request->price);

            if($request->discount === 'fixed'){
                $discount_price = Currency::convertUserCurrencyToDefault($request->fixed);
            }else if($request->discount === 'percent'){
                $discount_price = Number::percentageDecrease($request->percent, $price);
            }

            $batch->update([
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
                'images' => $image,
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
