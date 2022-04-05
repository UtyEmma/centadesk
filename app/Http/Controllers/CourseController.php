<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Traits\AppActions;
use App\Http\Traits\CourseActions;
use App\Library\FileHandler;
use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CourseController extends Controller{
    use AppActions, CourseActions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){
        $courses =  Courses::all();

        $courses = $courses->map(function($course){
            $course->course_reviews = Review::where('course_id', $course->unique_id)->get();
            $course->mentor = User::where('unique_id', $course->mentor_id)->first();
            return $course;
        });

        return view('front.courses', [
            'courses' => $courses,
            'data' => $this->app_data()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        return view('dashboard.create-courses', [
            'data' => $this->appData($request)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request){
        try {
            $user = $this->user();

            if ($user->kyc_status === 'pending') redirect()->back()->with('error', 'You cannot create courses because your mentor application has not been approved.');

            $course_id = Token::unique('courses');
            $batch_id = Token::unique('batches');

            $images = FileHandler::upload($request->file('images'));
            $slug = Str::slug($request->name, '-');

            $course = Courses::create([
                'unique_id' => $course_id,
                'mentor_id' => $user->unique_id,
                'name' => $request->name,
                'slug' => $slug,
                'desc' => $request->desc,
                'tags' => $request->tags,
                'video' => $request->video,
                'images' => $images,
                'currency' => $user->currency,
            ]);

            $user->total_courses = $user->total_courses + 1;
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

            return redirect()->back()->with('success', 'Course Created Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fetch(){
        $user = $this->user();
        $courses = User::find($user->unique_id)->courses;

        return view('dashboard.courses', [
            'courses' => $courses,
            'data' => $this->app_data()
        ]);
    }

    public function single($slug){
        $user = $this->user();

        $course = Courses::where([
            'slug' => $slug,
            'mentor_id' => $user->unique_id
        ])->first();

        $batches = $course->batches;
        $reviews = $course->reviews;

        if(!$course) return redirect('/404');

        return view('dashboard.course-details.overview', [
            'course' => $course,
            'batches' => $batches,
            'mentor' => $user,
            'reviews' => $reviews,
            'data' => $this->app_data()
        ]);
    }

    public function show($slug){
        $user = $this->user();
        if(!$course = Courses::where('slug', $slug)->first()) return Response::redirect('/courses', 'errors', 'Course Was not Found');
        $obj = $this->singleCourse($course);

        if($user){
            $course->user_enrolled = !!Enrollment::where([
                'course_id' => $course->unique_id,
                'student_id' => $user->unique_id
            ])->first();
        }else{
            $course->user_enrolled =  false;
        }

        return view('front.course-detail', [
            'course' => $course,
            'mentor' => $obj->mentor,
            'batch' => $obj->batch,
            'user' => $user,
            'reviews' => $obj->reviews,
            'data' => $this->app_data()
        ]);
    }

    public function enrollment($slug){
        $user = $this->user();
        if(!$course = Courses::where('slug', $slug)->first()) return Response::redirect('/courses', 'errors', 'Course Was not Found');
        $obj = $this->singleCourse($course);

        return view('front.enroll', [
            'course' => $course,
            'mentor' => $obj->mentor,
            'batch' => $obj->batch,
            'user' => $user,
            'reviews' => $obj->reviews,
            'data' => $this->app_data()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
