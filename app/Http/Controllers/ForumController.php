<?php

namespace App\Http\Controllers;

use App\Http\Traits\CourseActions;
use App\Library\DateTime;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller{
    use CourseActions;

    function sendMessage(Request $request, $batch_id) {
        try {
            $user = $this->user();
            $unique_id = Token::unique('forum_messages');

            ForumMessages::create([
                'unique_id' => $unique_id,
                'batch_id' => $batch_id,
                'sender_id' => $user->unique_id,
                'message' => $request->message
            ]);

            return Response::redirectBack();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    function fetchMessages(Request $request, $batch_id){
        $batch = Batch::findOrFail($batch_id);
        $messages = ForumMessages::where('batch_id', $batch->unique_id)->get();
        return $messages;
    }


    function fetchMentorBatchForum(Request $request, $slug, $shortcode){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $batch = Batch::where('short_code', $shortcode)->first();

        $messages = ForumMessages::where('batch_id', $batch->unique_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar', 'users.unique_id as user_id')
                                ->get();

        $mentor = User::find($batch->mentor_id);

        $messages->map(function($message) use ($mentor){
            $message->time_interval = DateTime::getDateInterval($message->created_at);
            $message->is_mentor = $mentor->unique_id === $message->user_id;
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

    function fetchMentorBatchForumReplies(Request $request, $slug, $shortcode, $message_id){
        $user = $this->user();
        $message = ForumMessages::find($message_id);
        $sender = User::find($message->sender_id);

        $course = Courses::where('slug', $slug)->first();
        $batch = Batch::where('short_code', $shortcode)->first();

        $forum_messages = ForumMessages::where('batch_id', $batch->unique_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                ->get();

        $messages = array_map(function($message){
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $batch->begins = DateTime::getDateInterval($batch->startdate);

        $replies = ForumReplies::where('message_id', $message_id)
                                    ->join('users', 'users.unique_id', 'forum_replies.sender_id')
                                    ->select('forum_replies.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                    ->get();

        $message->firstname = $sender->firstname;
        $message->lastname = $sender->lastname;
        $message->avatar = $sender->avatar;

        $message->time_interval = DateTime::getDateInterval($message->updated_at);

        return view('dashboard.course-details.batch.forum-replies', [
            'batch' => $batch,
            'course' => $course,
            'mentor' => $user,
            'forum' => $messages,
            'user' => $user,
            'message' => $message,
            'replies' => $replies
        ]);

        return view('dashboard.course-details.batch.forum-replies', [

        ]);
    }
}
