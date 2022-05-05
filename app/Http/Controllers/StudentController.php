<?php

namespace App\Http\Controllers;

use App\Casts\Currency;
use App\Http\Traits\BatchActions;
use App\Http\Traits\CourseActions;
use App\Http\Traits\UserActions;
use App\Library\DateTime;
use App\Library\Response;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
    use CourseActions, UserActions, BatchActions;

    public function show(Request $request){
        $user = $this->user();

        return view('front.student.profile', [
            'user' => $user
        ]);
    }

    public function fetchMentors(Request $request){
        $user = $this->user();
        $mentors = Enrollment::where('student_id', $user->unique_id)
                        ->join('users', 'users.unique_id', 'enrollments.mentor_id')
                        ->select('users.*')
                        ->get();

        return view('front.student.mentors', [
            'mentors' => $mentors
        ]);
    }

    public function enrolledCourses(Request $request){
        $user = $this->user();
        $suggestedCourses = $this->getSuggestedCourses($user);
        $enrolledBatches = $user->batches();

        // return print_r($enrolledBatches);

        return view('front.student.enrolled-courses', [
            'courses' => $enrolledBatches,
            'suggested' => $suggestedCourses
        ]);
    }

    public function update(Request $request){
        try {
            $user = $this->updateUser($request, $this->user());
            if(!$user) throw new Exception("Your Profile could not be updated");
            return Response::redirectBack('success', 'Your Profile has been updated successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }


    function courseForum(Request $request, $slug, $shortcode){
        try {
            if(!$batch = Batch::where('short_code', $shortcode)->first()) throw new Exception("The requested batch does not exist");
            $data = $this->getEnrolledBatch($batch, $this->user());
            return view('front.student.course.forum', $data);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function enrolledCourse(Request $request, $slug, $shortcode){
        if(!$course = Courses::where('slug', $slug)->first()) return Response::redirectBack('error', 'Course Does Not Exist');
        if(!$batch = Batch::where('short_code', $shortcode)->first()) return Response::redirectBack('error', 'Batch Does Not Exist');
        $user = $this->user();

        $data = array_merge([
            'course' => $course
        ], $this->getEnrolledBatch($batch, $user));

        return view('front.student.course.overview', $data);
    }

    function overview(Request $request){
        $user = $this->user();
        $courses = $user->batches();
        $events = $user->enrolledBatches();

        $new_event = $events->map(function($event){
            $startdate = Date::parse($event->startdate);
            $enddate = Date::parse($event->enddate);
            return [
                'title' => $event->title,
                'start' => $startdate->format('Y-m-d'),
                'end' => $enddate->format('Y-m-d'),
            ];
        });


        return Response::view('front.student.overview', [
            'user' => $user,
            'courses' => $courses,
            'events' => $new_event->toJson()
        ]);
    }

}
