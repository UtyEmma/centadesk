<?php

namespace App\Http\Controllers;

use App\Models\Batch;
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

    function fetchStudents(Request $request){
        $user = $this->user();

        $enrollments = DB::table('enrollments')
                            ->where('batch_id', $request->batch_id)
                            ->join('courses', 'courses.unique_id', 'enrollments.course_id')
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('courses.*', 'users.*')
                            ->get();

        return view('', [
            'batches' => $enrollments
        ]);
    }

}
