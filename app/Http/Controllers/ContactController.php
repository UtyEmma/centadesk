<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Library\Response;
use App\Mail\ContactEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller{


    function sendContactMessage(ContactMessageRequest $request){
        // try {
            $email = env('LIBRACLASS_EMAIL');
            // $admins = Admin::all();
            Mail::to($email)->send(new ContactEmail($request));

            return Response::redirectBack('success', 'Your Message has been sent!');
        // } catch (\Throwable $th) {
        //     return Response::redirectBack('error', $th->getMessage());
        // }
    }

}
