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
        return Response::view('admin.course.batch.info', $batch);

    }

}
