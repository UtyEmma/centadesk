<?php

namespace App\Http\Controllers;

use App\Casts\Currency;
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
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{
    use CourseActions, UserActions;

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

        $courses = Enrollment::where('student_id', $user->unique_id)
                        ->join('courses', 'courses.unique_id', 'enrollments.course_id')
                        ->join('batches', 'batches.unique_id', 'enrollments.batch_id')
                        ->join('users', 'users.unique_id', 'enrollments.mentor_id')
                        ->select('courses.name', 'courses.slug', 'courses.tags', 'users.firstname', 'users.lastname', 'users.username', 'batches.images', 'batches.video', 'batches.status', 'batches.attendees')
                        ->get();
        return view('front.student.enrolled-courses', [
            'courses' => $courses
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


    function courseForum(Request $request, $slug){
        return view('front.student.course.forum', $this->fetchCourse($request, $slug));
    }

    function courseForumDetails(Request $request, $slug, $message_id){
        $user = $this->user();
        $message = ForumMessages::find($message_id);
        $sender = User::find($message->sender_id);

        $course = $this->fetchCourse($request, $slug);

        $replies = ForumReplies::where('message_id', $message_id)
                                    ->join('users', 'users.unique_id', 'forum_replies.sender_id')
                                    ->select('forum_replies.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                    ->get();

        $message->firstname = $sender->firstname;
        $message->lastname = $sender->lastname;

        $message->created_at = DateTime::getDateInterval($message->created_at);

        return view('front.student.course.question', array_merge($course, [
                'message' => $message,
                'replies' => $replies
            ]
        ));
    }

    public function enrolledCourse(Request $request, $slug){
        return view('front.student.course.overview', $this->fetchCourse($request, $slug));
    }

}
