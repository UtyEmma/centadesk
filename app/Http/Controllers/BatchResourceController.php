<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatchResourceRequest;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\BatchResource;
use Illuminate\Http\Request;

class BatchResourceController extends Controller{

    function create(CreateBatchResourceRequest $request, $slug, $shortcode){
        try {
            $batch = Batch::where('short_code', $shortcode)->first();
            $unique_id = Token::unique('batch_resources');
            BatchResource::create(array_merge($request->validated(), ['unique_id' => $unique_id, 'batch_id' => $batch->unique_id]));
            return Response::redirectBack('success', "Batch Resource Added");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function edit(CreateBatchResourceRequest $request, $slug, $shortcode, $resource_id){
        try {
            $batch_resource = BatchResource::where('unique_id', $resource_id)->first();
            $batch_resource->update($request->validated());
            return Response::redirectBack('success', "Batch Resource Updated");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function delete($slug, $shortcode, $resource_id){
        try {
            $batch_resource = BatchResource::where('unique_id', $resource_id)->first();
            $batch_resource->delete();
            return Response::redirectBack('success', "Batch Resource Deleted");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
