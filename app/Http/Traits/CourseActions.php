<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use stdClass;

trait CourseActions {

    public function fetchCourse ($request, $slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $enrollment = Enrollment::where([
            'student_id' => $user->unique_id,
            'course_id' => $course->unique_id
        ])->first();

        $forum_messages = ForumMessages::where('batch_id', $enrollment->batch_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                ->get();

        $messages = array_map(function($message){
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $mentor = User::find($enrollment->mentor_id);
        $batch = Batch::find($enrollment->batch_id);

        $batch->begins = DateTime::getDateInterval($batch->startdate);

        return [
            'batch' => $batch,
            'course' => $course,
            'enrollment' => $enrollment,
            'mentor' => $mentor,
            'forum' => $messages,
            'user' => $user
        ];
    }

    function singleCourse($course){
        $obj = new stdClass();
        $obj->mentor = User::find($course->mentor_id);
        $obj->batch = Batch::find($course->active_batch);
        $obj->reviews = $course->allReviews;
        return $obj;
    }
}
