<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reports\CreateReportRequest;
use App\Library\DateTime;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller{


    function create(CreateReportRequest $request, $batch_id){
        if(!$batch = Batch::find($batch_id)) return Response::redirectBack('error', 'Batch Not Found');
        if(DateTime::dateDiff($batch->enddate, now()) > env('WITHDRAWAL_DAY_COUNT')) return Response::redirectBack('error', 'You cannot report this batch now! Because a maximum of '.env('WITHDRAWAL_DAY_COUNT').' days has been exceeded');

        $user = $this->user();
        $unique_id = Token::unique('reports');

        $report = Report::create([
            'unique_id' => $unique_id,
            'student_id' => $user->unique_id,
            'batch_id' => $batch_id,
            'message' => $request->report
        ]);

        $batch->payable = false;
        $batch->save();

        return Response::redirectBack('success', 'Report Submitted Successfully');
    }

    function resolve(Request $request, $batch_id){
        if(!$batch = Batch::find($batch_id)) return Response::redirectBack('error', 'Batch Not Found');
        $user = $this->user();

        $report = Report::where([
            'batch_id' => $batch->unique_id,
            'student_id' => $user->unique_id
        ])->first();

        if(!$report) return Response::redirectBack('error', 'Report does not exist');

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

        return Response::redirectBack('success', 'Your Report has been marked as resolved');
    }
}
