<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Library\FileHandler;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(){
        $courses = Courses::all();
        return view('front.courses', [
            'courses' => $courses
        ]);
    }

    public function enroll($slug){
        $course = Courses::where('slug', $slug)->first();
        $batch = Batch::find($course->active_batch);
        return view('front.student.course-enrollment', [
            'course' => $course,
            'batch' => $batch
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('dashboard.create-courses');
    }

    public function studentCourses(){
        return view('front.student.enrolled-courses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request){
        $course_id = Token::unique('courses');
        $batch_id = Token::unique('batches');

        $user = $this->user();

        $images = FileHandler::uploadMultiple($request->file('images'), 'courses');
        $slug = Str::slug($request->name, '-');

        $course = Courses::create([
            'unique_id' => $course_id,
            'mentor_id' => $user->unique_id,
            'name' => $request->name,
            'slug' => $slug,
            'desc' => $request->desc,
            'tags' => $request->tags,
            'video' => $request->video,
            'images' => $images
        ]);

        $user->total_courses = $user->total_courses + 1;

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
            'images' => $images
        ]);

        $course->update([
            'total_batches' => $course->total_batches + 1,
            'active_batch' => $batch->unique_id
        ]);

        $user->total_batches = $user->total_batches + 1;

        $user->save();

        return redirect()->back()->with('message', 'Course Created Successfully');
    }

    public function fetch(){
        $user = $this->user();
        $courses = User::find($user->unique_id)->courses;

        return view('dashboard.courses', [
            'courses' => $courses
        ]);
    }

    public function single($slug){
        $user = $this->user();

        $course = Courses::where([
            'slug' => $slug,
            'mentor_id' => $user->unique_id
        ])->first();

        $batches = Courses::find($course->unique_id)->batches;

        if(!$course) return redirect('/404');

        return view('dashboard.course-details', [
            'course' => $course,
            'batches' => $batches
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $course = Courses::where('slug', $slug)->first();
        $mentor = User::find($course->mentor_id);
        $batch = Batch::find($course->active_batch);
        return view('front.course-detail', [
            'course' => $course,
            'mentor' => $mentor,
            'batch' => $batch
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
    public function destroy($id)
    {
        //
    }
}
