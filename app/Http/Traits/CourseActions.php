<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\User;

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
            $message['replies'] = ForumReplies::where('message_id', $message['unique_id'])
                            ->join('users', 'users.unique_id', 'forum_replies.sender_id')
                            ->select('forum_replies.*', 'users.firstname', 'users.lastname', 'users.avatar')
                            ->get()->toArray();
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $mentor = User::find($enrollment->mentor_id);
        $batch = Batch::find($enrollment->batch_id);


        return [
            'batch' => $batch,
            'course' => $course,
            'enrollment' => $enrollment,
            'mentor' => $mentor,
            'forum' => $messages,
            'user' => $user
        ];
    }
}
