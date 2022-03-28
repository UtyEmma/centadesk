<?php

namespace App\Http\Controllers;

use App\Http\Traits\BatchActions;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\ForumMessages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\throwException;

class BatchController extends Controller{
    use BatchActions;

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

    function fetchBatchStudents(Request $request, $slug, $shortcode){
        try {
            $details = $this->mentorBatchDetails($shortcode, true);
            return response()->view('dashboard.course-details.batch.students', $details);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    function fetchBatch(Request $request, $slug, $shortcode){
        $user = $this->user();

        $batch = Batch::where('short_code', $shortcode)->first();
        $course = Courses::find($batch->course_id);

        $students = DB::table('enrollments')
                            ->where('batch_id', $request->batch_id)
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('users.*')
                            ->get();

        $batches = Courses::find($batch->course_id)->batches;

        return view('dashboard.course-details.batch.overview', [
            'course' => $course,
            'batches' => $batches,
            'batch' => $batch,
            'students' => $students,
            'mentor' => $user
        ]);
    }

}
