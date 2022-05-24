<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFaqRequest;
use App\Library\Response;
use App\Library\Token;
use App\Models\Faq;
use Illuminate\Http\Request;
use Throwable;

class FaqController extends Controller{

    function create (CreateFaqRequest $request) {
        try {
            $unique_id = Token::unique('faqs');

            Faq::create([
                'unique_id' => $unique_id,
                'title' => $request->title,
                'type' => $request->type,
                'content' => $request->content
            ]);

            return Response::redirectBack('success', 'FAQ Added');
        } catch (Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function all(){
        try {
            $faqs = Faq::paginate(env('ADMIN_PAGINATION_COUNT'));
            return Response::view('admin.faqs', [
                'faqs' => $faqs
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function delete($id){
        try {
            Faq::find($id)->delete();
            return Response::redirectBack('success', 'FAQ Deleted');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function status($id){
        try {
            $faq = Faq::find($id);
            $faq->status = !$faq->status;
            $faq->save();
            $status = $faq->status ? 'Enabled' : 'Disabled';

            return Response::redirectBack('success', "FAQ $status");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
