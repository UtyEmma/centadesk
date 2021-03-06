<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Traits\AppActions;
use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Http\Traits\ReviewActions;
use App\Library\FileHandler;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Courses;
use App\Models\User;
use App\Notifications\CoursePublishedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class CourseController extends Controller{
    use AppActions, CourseActions, ReviewActions, CategoryActions;


    public function all(Request $request){
        global $type;
        $user = $this->user();
        $type = 'page';

        if($keyword = $request->keyword){
            $type = 'search';
            $results = Courses::search($request->keyword)
                    ->where('status', 'published')
                    ->orderBy(Batch::select('startdate')->whereColumn('courses.unique_id', 'batches.course_id'))->paginate(env('PAGINATION_COUNT'));
        }else{
            $query =  Courses::query();

            $query->with(['mentor', 'enrollments.student'])
                        ->withCount('allReviews')
                        ->withCount('batches')
                        ->withCount('enrollments');

            $query->when($request->category, function($query, $category){
                return $query->where('category', $category);
            });

            $query->where('status', 'published');

            $query->when($request->filter === 'suggestions', function($query) use ($user){
                return $this->sortCoursesBasedOnUserInterest($query);
            });

            $query->when($request->order === 'popularity', function ($query) {
                return $query->orderBy('total_students', 'desc');
            });

            $query->when($request->order === 'rating', function ($query) {
                return $query->orderBy('rating', 'desc');
            });
            $query->orderBy(Batch::select('startdate')->whereColumn('courses.unique_id', 'batches.course_id'));
            $results = $query->paginate(env('PAGINATION_COUNT'));

        }

        return view('front.courses', [
            'courses' => $results,
            'data' => $this->app_data(),
            'type' => $type,
            'user' => $this->user(),
            // 'categories' => $this->getAllCategories()
            'categories' => $this->getActiveCategories()
        ]);
    }

    public function coursesByVerifiedUsers($query){
        // $verificationStatuses = implode(',', ["verified", "requested", "unverified"]);

        // $query->join('users', 'users.unique_id', 'courses.unique_id')
        //             ->select('courses.*', 'users.is_verified')
        //             ->orderByRaw("FIELD(is_verified, $verificationStatuses)");
        // $withVerifiedUsers = $query->whereRelation('mentor', 'is_verified', 'verified');
        return $query->whereRelation('mentor', 'is_verified', 'verified');
    }

    public function sortCoursesBasedOnUserInterest($query){
        $user = $this->user();

        return $query->when($user, function($query, $user) {
            $interest = $user->interests;
            return $query->whereIn('category', $interest);
        }, function($query){
            return $query;
        });
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
                'course' => $course,
                'link' => url("/courses/$slug")
            ];

            Notification::send($user, new CoursePublishedNotification($notification));

            return Response::redirect("/me/courses/$course->slug/batch/new", 'success', 'Course Created Successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function fetch(){
        $user = $this->user();
        $courses = User::find($user->unique_id)
                            ->courses()
                            ->withCount(['batches', 'enrollments'])
                            ->paginate(env('PAGINATION_COUNT'));

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
            'data' => $this->app_data(),
        ]);
    }

    public function show($slug){
        $user = $this->user();
        if(!$course = Courses::where('slug', $slug)->first())
        return Response::redirectBack('errors', 'Course Was not Found');
        $obj = $this->getCourseData($course, $user);
        $batches = Batch::where('course_id', $course->unique_id)
                        ->join('courses', 'batches.course_id', '=', 'courses.unique_id')
                        ->with(['course', 'enrollments'])
                        ->withCount(['course', 'enrollments'])
                        ->get();

        return view('front.course-detail', [
            'course' => $course,
            'batches' => $batches,
            'mentor' => $obj->mentor,
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
        $categories = $this->getAllCategories();

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

            $image = $request->hasFile('images') ? FileHandler::updateFile($request->file('images'), $course->images) : $course->images;

            $category = Category::where('slug', $request->category)->first();
            $slug = Str::slug($request->name, '-');

            $course->update([
                'name' => $request->name,
                'slug' => $slug,
                'desc' => $request->desc,
                'tags' => $request->tags,
                'video' => $request->video,
                'images' => $image,
                'currency' => $user->currency,
                'category' => $category->name
            ]);

            return Response::redirectBack('success', "You course has been updated");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function destroy($slug){
        if(!$course = Courses::where('slug', $slug)->first()) return Response::redirectBack('error', "Course Not Found");
        $course->delete();
        return Response::redirect('/me/courses', 'success', 'Your course was deleted successfully');
    }
}
