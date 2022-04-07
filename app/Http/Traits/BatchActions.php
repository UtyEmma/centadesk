<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait BatchActions {
    use StudentActions;

    function mentorBatchDetails($shortcode, bool $getStudents = false, bool $getForum = false){
        $user = $this->user();

        if(!$batch = Batch::where(['short_code' => $shortcode])->first())
            throw new Exception("No Batch was found with the shortcode: '$shortcode'", 404);

        if(!$course = Batch::find($batch->unique_id)->course)
            throw new Exception("Invalid Request: The requested course does not exist", 404);

        if($course->mentor_id !== $user->unique_id)
            throw new Exception('Invalid Request: Batch was not created by user', 400);

        $students = $getStudents ? $this->students($batch->unique_id) : [];
        $forum = $getForum ? $this->forum($batch->unique_id) : [];
        $batches = $this->batches($course);

        return [
            'batch' => $batch,
            'messages' => $forum,
            'students' => $students,
            'course' => $course,
            'mentor' => $user,
            'batches' => $batches
        ];
    }

    function batches($course){
        return $course->batches;
    }

    function applyDiscount($price, $discount, $type){
        if($type === 'fixed') return $discount;
        if($type === 'percent') return $price - ($discount / 100 * $price);
        if($type === 'none') return $price;
    }

    function students($batch_id){
        $students = DB::table('enrollments')
                            ->where('batch_id', $batch_id)
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('users.*', 'enrollments.created_at')
                            ->get();

        $students->map(function($student){
            $student->enrolled_at = DateTime::parseTimestamp($student->created_at)->date;
            $this->parseStudentData($student);
        });

        return $students;
    }

    function forum($batch_id){
        $forum_messages = ForumMessages::where('batch_id', $batch_id)
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

        return $messages;
    }

    function getCourseBatches($course){
        return Batch::where([
            'course_id' => $course->unique_id
        ])->get();
    }

}
