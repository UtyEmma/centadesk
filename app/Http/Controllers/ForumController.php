<?php

namespace App\Http\Controllers;

use App\Library\Token;
use App\Models\Batch;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller{

    function storeMessage(Request $request) {
        try {
            $batch_id = $request->batch_id;
            $unique_id = Token::unique('forum_messages');

            $message = ForumMessages::create([
                'unique_id' => $unique_id,
                'batch_id' => $batch_id,
                'sender_id' => $request->user_id,
                'message' => $request->message
            ]);

            return response()->json([
                'message' => $message
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }

    function fetchMessages(Request $request, $batch_id){
        $batch = Batch::findOrFail($batch_id);

        $messages = DB::table('forum_messages')
                        ->where('batch_id', $batch->unique_id)
                        ->join('forum_replies', 'forum_messages.unique_id' ,'forum_replies.message_id')
                        ->get();

        return $messages;
    }


    function storeReplies(Request $request, $message_id){
        try {
            $message = ForumMessages::find($message_id);

            $unique_id = Token::unique('forum_replies');

            $reply = ForumReplies::create([
                'unique_id' => $unique_id,
                'batch_id' => $message->batch_id,
                'message_id' => $message_id,
                'sender_id' => $request->user_id,
                'message' => $request->message
            ]);

            return response()->json([
                'message' => $reply
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 400);
        }
    }
}
