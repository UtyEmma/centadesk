<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BatchActions;
use App\Library\Currency;
use App\Library\DateTime;
use App\Library\FileHandler;
use App\Library\Number;
use App\Library\Response;
use App\Models\Batch;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;

class BatchController extends Controller{
    use BatchActions;

    function show($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->first()) return Response::redirectBack('error', "No Batch was found with the shortcode: '$shortcode'");

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

    function freezeFunds($batch_id){
        $batch = Batch::find($batch_id);
        $batch->payable = false;
        $batch->save();

        return Response::redirectBack('success', 'Batch Payments Suspended');
    }

    function batch_forum($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->first()) return Response::redirectBack('error', 'Batch does not exist');
        $messages = Messages::where('batch_id', $batch->unique_id)->with(['user'])->get();
        $mentor = User::find($batch->mentor_id);

        $batch = $this->getBatchDetails($shortcode);

        $messages->map(function($message) use ($mentor){
            $message->time_interval = DateTime::getDateInterval($message->created_at);
            $message->is_mentor = $mentor->unique_id === $message->user_id;
            $message->is_sender = $message->sender_id === $mentor->unique_id;
            return $message;
        });

        return Response::view('admin.course.batch.forum', [
            'batch' => $batch['batch'],
            'course' => $batch['course'],
            'messages' => $messages
        ]);
    }

    function edit($slug, $shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->get()) return Response::redirectBack('error', 'Batch does not exist');
        $batch = $this->getBatchDetails($shortcode);

        return Response::view('admin.course.batch.edit', [
            'batch' => $batch['batch'],
            'course' => $batch['course']
        ]);
    }

    function update(Request $request, $slug, $shortcode){
        $user = $this->user();

            $batch = Batch::where('short_code', $shortcode)->first();

            $image = $request->hasFile('images') ? FileHandler::updateFile($request->file('images'), $batch->images) : $batch->images;

            $discount_price = $batch->discount_price;
            $price = Currency::convertUserCurrencyToDefault($request->price);

            if($request->discount === 'fixed'){
                $discount_price = Currency::convertUserCurrencyToDefault($request->fixed);
            }else if($request->discount === 'percent'){
                $discount_price = Number::percentageDecrease($request->percent, $price);
            }

            $batch->update([
                'duration' => $request->duration,
                'excerpt' => $request->excerpt,
                'objectives' => $request->objectives,
                'class_link' => $request->class_link,
                'access_link' => $request->access_link,
                'attendees' => $request->attendees,
                'price' => $price,
                'current' => true,
                'count' => 1,
                'desc' => $request->desc,
                'video' => $request->video,
                'certificates' => $request->certificates === 'on' ? true : false,
                'images' => $image,
                'startdate' => $request->startdate,
                'enddate' => $request->enddate,
                'title' => $request->title,
                'discount' => $request->discount,
                'discount_price' => $discount_price,
                'fixed' => $request->fixed,
                'percent' => $request->percent,
                'time_limit' => $request->time_limit,
                'signup_limit' => $request->signup_limit,
                'currency' => $user->currency,
            ]);
            return Response::redirectBack("success", "Batch Updated Successfully!");
    }

}
