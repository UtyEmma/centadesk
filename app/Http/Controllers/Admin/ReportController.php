<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller{

    function viewAllReports(){
        $reports = Report::paginate(env('ADMIN_PAGINATION_COUNT'));

        $reports->map(function($report){
            $report->user = User::find($report->student_id);
            $batch = Batch::find($report->batch_id);
            $report->batch = $batch;
            $report->course = Courses::find($batch->course_id);
            $report->mentor = User::find($batch->mentor_id);
        });

        return Response::view('admin.reports', [
            'reports' => $reports
        ]);
    }

    function resolve(Request $request, $report_id){
        if(!$report = Report::find($report_id)) return Response::redirectBack('error', 'Report does not exist');
        // if(!$student = User::find($report->student_id)) return Response::redirectBack('error', 'Student Not Found');
        if(!$batch = Batch::find($report->batch_id)) return Response::redirectBack('error', 'Batch Not Found');

        $report->status = 'resolved';
        $report->save();

        $batchActiveReports = Report::where([
            'batch_id' => $batch->unique_id,
            'status' => 'pending'
        ])->get();

        if($batchActiveReports->isEmpty()) {
            $batch->payable = true;
            $batch->save();
        }

        return Response::redirectBack('success', 'This Report has been marked as resolved');
    }

}
