<?php

namespace App\Http\Controllers;

use App\Http\Traits\CourseActions;
use App\Library\DateTime;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller{
    use CourseActions;

    function sendMessage(Request $request, $batch_id, $user_id) {
        try {
            $user = User::find($user_id);
            $unique_id = Token::unique('messages');

            $message = Messages::create([
                'unique_id' => $unique_id,
                'batch_id' => $batch_id,
                'sender_id' => $user->unique_id,
                'message' => $request->message
            ]);

            return Response::json(200, 'Message Sent', [
                'message' => $message
            ]);
        } catch (\Throwable $th) {
            return Response::json(400, $th->getMessage());
        }
    }

    function fetchMessages(Request $request, $batch_id){
        $batch = Batch::findOrFail($batch_id);
        $messages = Messages::where('batch_id', $batch->unique_id)->get();
        return $messages;
    }


    function fetchMentorBatchForum(Request $request, $slug, $shortcode){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $batch = Batch::where('short_code', $shortcode)->with(['mentor', 'course', 'enrollments.student'])->first();

        $messages = Messages::where('batch_id', $batch->unique_id)->with(['user'])->get();

        $mentor = User::find($batch->mentor_id);

        $messages->map(function($message) use ($mentor, $user){
            $message->time_interval = DateTime::getDateInterval($message->created_at);
            $message->is_mentor = $mentor->unique_id === $message->user_id;
            $message->is_sender = $message->sender_id === $user->unique_id;
            return $message;
        });

        $batch->begins = DateTime::getDateInterval($batch->startdate);


        return view('dashboard.course-details.batch.forum', [
            'batch' => $batch,
            'course' => $course,
            'mentor' => $user,
            'messages' => $messages,
            'user' => $user
        ]);
    }

}
