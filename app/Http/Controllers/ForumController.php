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

    function storeMessage(Request $request, $batch_id) {
        try {
            $user = $this->user();
            $unique_id = Token::unique('forum_messages');

            $batch = Batch::find($batch_id);
            $course = Courses::find($batch->course_id);

            $message = ForumMessages::create([
                'unique_id' => $unique_id,
                'batch_id' => $batch_id,
                'sender_id' => $user->unique_id,
                'message' => $request->message,
                'title' => $request->title
            ]);

            return redirect()->back()->with('success', "Your Question has been sent");

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    function fetchMessages(Request $request, $batch_id){
        $batch = Batch::findOrFail($batch_id);
        $messages = ForumMessages::where('batch_id', $batch->unique_id)->get();
        return $messages;
    }

    function fetchResponses(Request $request, $batch_id, $message_id){
        $replies = ForumReplies::where([
            'message_id' => $message_id,
            'batch_id' => $batch_id
        ])->get();
        return Response::view('');
    }


    function storeReplies(Request $request, $message_id){
        try {
            $message = ForumMessages::find($message_id);
            $user = $this->user();

            $unique_id = Token::unique('forum_replies');

            $reply = ForumReplies::create([
                'unique_id' => $unique_id,
                'batch_id' => $message->batch_id,
                'message_id' => $message_id,
                'sender_id' => $user->unique_id,
                'message' => $request->message
            ]);

            return Response::redirectBack('success', 'Reply Submitted');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function fetchMentorForumReplies(Request $request, $slug, $shortcode, $message_id){
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

    function fetchMentorBatchForum(Request $request, $slug, $shortcode){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $batch = Batch::where('short_code', $shortcode)->first();
        $batches = Batch::where('course_id', $course->unique_id)->get();
        $forum_messages = ForumMessages::where('batch_id', $batch->unique_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                ->get();

        $messages = array_map(function($message){
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $batch->begins = DateTime::getDateInterval($batch->startdate);

        return view('dashboard.course-details.batch.forum', [
            'batch' => $batch,
            'course' => $course,
            'mentor' => $user,
            'forum' => $messages,
            'user' => $user,
            'batches' => $batches
        ]);
    }

    function fetchMentorBatchForumReplies(Request $request, $slug, $shortcode, $message_id){
        $user = $this->user();
        $message = ForumMessages::find($message_id);
        $sender = User::find($message->sender_id);

        $course = Courses::where('slug', $slug)->first();

        $batch = Batch::where('short_code', $shortcode)->first();
        $batches = Batch::where('course_id', $course->unique_id)->get();

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

        $message->created_at = DateTime::getDateInterval($message->created_at);

        return view('dashboard.course-details.batch.forum-replies', [
            'batch' => $batch,
            'course' => $course,
            'mentor' => $user,
            'forum' => $messages,
            'user' => $user,
            'batches' => $batches,
            'message' => $message,
            'replies' => $replies
        ]);

        return view('dashboard.course-details.batch.forum-replies', [

        ]);
    }
}
