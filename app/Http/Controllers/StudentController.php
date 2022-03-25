<?php

namespace App\Http\Controllers;

use App\Http\Traits\CourseActions;
use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
    use CourseActions;

    public function show(Request $request){
        $user = $this->user();

        return view('front.student.profile');
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

        $courses = DB::table('enrollments')->where('student_id', $user->unique_id)
                        ->join('courses', 'courses.unique_id', 'enrollments.course_id')
                        ->join('batches', 'batches.unique_id', 'enrollments.batch_id')
                        ->join('users', 'users.unique_id', 'enrollments.mentor_id')
                        ->select('courses.name', 'courses.slug', 'courses.tags', 'users.firstname', 'users.lastname', 'users.username', 'batches.images', 'batches.video', 'batches.status', 'batches.attendees' )
                        ->get();
        return view('front.student.enrolled-courses', [
            'courses' => $courses
        ]);
    }


    function courseForum(Request $request, $slug){
        return view('front.student.course.forum', $this->fetchCourse($request, $slug));

    }

    public function enrolledCourse(Request $request, $slug){
        return view('front.student.course.overview', $this->fetchCourse($request, $slug));
    }

}
