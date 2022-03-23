<?php

namespace App\Http\Controllers;

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

    public function enrolledCourse(Request $request, $slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $enrollment = Enrollment::where([
            'student_id' => $user->unique_id,
            'course_id' => $course->unique_id
        ])->first();

        $batch = Batch::find($enrollment->batch_id);

        $forum_messages = ForumMessages::where('batch_id', $enrollment->batch_id)
                                        ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                        ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                        ->get();

        $messages = array_map(function($message){
            $message['replies'] = ForumReplies::where('message_id', $message['unique_id'])
                                                ->join('users', 'users.unique_id', 'forum_replies.sender_id')
                                                ->select('forum_replies.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                                ->get()->toArray();
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $mentor = User::find($enrollment->mentor_id);
        $batch = Batch::find($enrollment->batch_id);

        // return print_r($messages);

        return view('front.student.enrolled-course-detail', [
            'batch' => $batch,
            'course' => $course,
            'enrollment' => $enrollment,
            'mentor' => $mentor,
            'forum' => $messages,
            'user' => $user
        ]);
    }

}
