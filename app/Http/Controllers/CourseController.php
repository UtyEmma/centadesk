<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Traits\AppActions;
use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Http\Traits\ReviewActions;
use App\Library\FileHandler;
use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Review;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\CoursePublishedNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class CourseController extends Controller{
    use AppActions, CourseActions, ReviewActions, CategoryActions;


    public function all(Request $request){
        $type = 'page';

        if($request->keyword){
            $type = 'search';
            $results = Courses::search($request->keyword)->where('status', 'published')->paginate(env('PAGINATION_COUNT'));
            $courses = $this->getCoursesData($results);
        }else{
            $data =  Courses::paginate(env('PAGINATION_COUNT'));
            $courses = $this->getCoursesData($data);
        }

        return view('front.courses', [
            'courses' => $courses,
            'data' => $this->app_data(),
            'type' => $type
        ]);
    }

    public function create(Request $request){
        $categories = Category::where('status', true)->get();

        return view('dashboard.create-courses', [
            'data' => $this->appData($request),
            'categories' => $categories
        ]);
    }

    public function store(CreateCourseRequest $request){
        try {
            $user = $this->user();

            if ($user->kyc_status !== 'approved')
                    return Response::redirectBack('error', 'You cannot create courses because your mentor application has not been approved yet!');

            $course_id = Token::unique('courses');
            if(!$category = Category::where('slug', $request->category)->first())
                        return Response::redirectBack('error', 'The selected category does not exist.');

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
                'excerpt' => $request->excerpt,
                'objectives' => $request->objectives,
                'images' => $images,
                'currency' => $user->currency,
                'category' => $category->name
            ]);

            $user->total_courses = $user->total_courses + 1;

            $category->courses += 1;
            $category->save();

            $notification = [
                'subject' => 'Your course has been created successfully',
                'course' => $course
            ];

            Notification::send($user, new CoursePublishedNotification($notification));

            return Response::redirect("/me/courses/$course->slug/batch/new", 'success', 'Course Created Successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
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

        if(!$course) return redirect('/404');

        $batches = $course->batches;
        $reviews = $this->getCourseReviews($course);

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
        if(!$course = Courses::where('slug', $slug)->first())
                    return Response::redirectBack('errors', 'Course Was not Found');
        $obj = $this->getCourseData($course, $user);

        return view('front.course-detail', [
            'course' => $course,
            'mentor' => $obj->mentor,
            'batch' => $obj->active_batch,
            'user' => $user,
            'reviews' => $obj->reviews,
            'data' => $this->app_data()
        ]);
    }

    public function enrollment($slug, $short_code){
        $user = $this->user();
        if(!$course = Courses::where('slug', $slug)->first()) return Response::redirect('/courses', 'errors', 'Course Was not Found');
        if(!$batch = Batch::where('short_code', $short_code)->first()) return Response::redirect('/courses', 'errors', 'The Requested Batch Was not Found');
        $obj = $this->singleCourse($course);
        $wallet = $user->wallet;


        return view('front.enroll', [
            'course' => $course,
            'mentor' => $obj->mentor,
            'batch' => $batch,
            'user' => $user,
            'reviews' => $obj->reviews,
            'data' => $this->app_data(),
            'wallet' => $wallet
        ]);
    }


    public function edit($slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();
        $data = $this->getCourseData($course, $user);
        $categories = $this->getActiveCategories();

        return Response::view('dashboard.course-details.edit', [
            'course' => $data,
            'data' => $this->app_data(),
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $slug){
        try {
            $user = $this->user();
            $course = Courses::where('slug', $slug)->first();

            $images = FileHandler::upload($request->file('images'));
            FileHandler::deleteFiles(json_decode($course->images));

            $category = Category::where('slug', $request->category)->first();
            $slug = Str::slug($request->name, '-');

            $course->update([
                'name' => $request->name,
                'slug' => $slug,
                'desc' => $request->desc,
                'tags' => $request->tags,
                'video' => $request->video,
                'images' => $images,
                'currency' => $user->currency,
                'category' => $category->name
            ]);

            return Response::redirectBack('success', "You course has been updated");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function destroy($id){
        $course = Courses::find($id);
        if($course) $course->delete();
        return Response::redirect('/me/courses', 'success', 'Your course was deleted successfully');
    }
}
