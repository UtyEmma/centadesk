<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Courses;
use App\Models\ForumMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller{

    function fetch(Request $request, $batch_id){
        $batch = DB::table('batches')
                    ->where('unique_id', $batch_id)
                    ->join('enrollments', 'batches.unique_id', 'enrollments.batch_id')
                    ->join('users', 'users.unique_id', 'enrollments.student_id')
                    ->get();

        return view('', [
            'batches' => $batch
        ]);
    }

    function fetchBatch(Request $request, $slug, $batch_id){
        $user = $this->user();

        $batch = Batch::where('short_code', $batch_id)->first();
        $course = Courses::find($batch->course_id);

        $students = DB::table('enrollments')
                            ->where('batch_id', $request->batch_id)
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('users.*')
                            ->get();

        $messages = DB::table('forum_messages')
                        ->where('batch_id', $batch->unique_id)
                        ->join('forum_replies', 'forum_messages.unique_id' ,'forum_replies.message_id')
                        ->get();

        return view('dashboard.batch-details', [
            'course' => $course,
            'batch' => $batch,
            'students' => $students,
            'messages' => $messages
        ]);
    }

}
