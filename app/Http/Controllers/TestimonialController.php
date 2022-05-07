<?php

namespace App\Http\Controllers;

use App\Library\FileHandler;
use App\Library\Response;
use App\Library\Token;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $testimonials = Testimonial::all();
        return Response::view('admin.testimonial', [
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        try {
            $unique_id = Token::unique('testimonials');
            $image = $request->has('image') ? FileHandler::upload($request->file('image')) : 'false';

            Testimonial::create([
                'unique_id' => $unique_id,
                'name' => $request->name,
                'feedback' => $request->feedback,
                'image' => $image,
                'occupation' => $request->occupation,
                'location' => $request->location
            ]);

            return Response::redirectBack('success', 'Testimonial Uploaded Successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function status(Request $request, $id){
        try {
            if(!$testimonial = Testimonial::find($id)) throw new Exception("The Testimonial does not exist");
            $testimonial->status = !!$testimonial->status;
            $testimonial->save();

            $status = $testimonial->status ? 'enabled' : 'disabled';

            return Response::redirectBack('success', "Testimonial was $status successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }

    }

    public function show($id){
        //
    }

    public function edit($id){
    }

    public function update(Request $request, $id){
        try {
            if(!$testimonial = Testimonial::find($id)) throw new Exception("The Testimonial does not exist");
            $image = $request->has('image') ? FileHandler::upload($request->file('image')) : 'false';
            FileHandler::deleteFile($testimonial->image);
            $testimonial->update([
                'name' => $request->name,
                'feedback' => $request->feedback,
                'image' => $image,
                'occupation' => $request->occupation,
                'location' => $request->location
            ]);

            return Response::redirectBack('success', 'Testimonial Updated');

        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    public function destroy($id){
        try {
            if(!$testimonial = Testimonial::find($id)) throw new Exception("The Testimonial does not exist");
            $testimonial->delete();
            return Response::redirectBack('success', "Testimonial Deleted");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
