<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{

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

    public function enrolledCourse(Request $request, $slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $enrollment = Enrollment::where([
            'student_id' => $user->unique_id,
            'course_id' => $course->unique_id
        ])->first();

        $batch = Batch::find($enrollment->batch_id);

        return view('front.student.enrolled-course-detail', [
            'batch' => $batch,
            'course' => $course,
            'enrollment' => $enrollment
        ]);
    }

}
