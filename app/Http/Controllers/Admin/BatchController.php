<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BatchActions;
use App\Library\Response;
use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller{
    use BatchActions;

    function show($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->get()) return Response::redirectBack('error', 'Batch does not exist');
        $batch = $this->getBatchDetails($shortcode);
        return Response::view('admin.course.batch.info', [
            'batch' => $batch['batch'],
            'course' => $batch['course']
        ]);
    }

    function batch_students($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->get()) return Response::redirectBack('error', 'Batch does not exist');
        $batch = $this->getBatchDetails($shortcode);
        return Response::view('admin.course.batch.students', [
            'batch' => $batch['batch'],
            'course' => $batch['course'],
            'students' => $this->students($batch['batch']->unique_id)
        ]);

    }

    function batch_forum($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->get()) return Response::redirectBack('error', 'Batch does not exist');
        $batch = $this->getBatchDetails($shortcode);
        return Response::view('admin.course.batch.forum', [
            'batch' => $batch['batch'],
            'course' => $batch['course'],
            'messages' => $this->forum($batch['batch']->unique_id)
        ]);
    }

}
