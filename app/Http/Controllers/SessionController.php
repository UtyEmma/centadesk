<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBatchRequest;
use App\Jobs\NewCourseAlert;
use App\Library\Currency;
use App\Library\FileHandler;
use App\Library\Notifications;
use App\Library\Number;
use App\Library\Response;
use App\Library\Str;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Courses;
use App\Notifications\NewBatchPublishedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function parseDiscount($request, $price){
        if($request->discount === 'fixed'){
            return Currency::convertUserCurrencyToDefault($request->fixed);
        }else if($request->discount === 'percent'){
            return Number::percentageDecrease($request->percent, $price);
        }

        return 0;
    }

    public function course ($request, $user){

    }

    public function createCourse(Request $request){

        // $course = null;
        // if($request->type === 'series' && $request->filled('name')) {
            $course_id = Token::unique('courses');
            $user = $this->user();
            $slug = Str::slug($request->name, '-');

            if(!$category = Category::where('slug', $request->category)->first())
                                        throw Response::redirectBack('error', 'The selected category does not exist.');

            $course = Courses::create([
                'unique_id' => $course_id,
                'mentor_id' => $user->unique_id,
                'name' => $request->name,
                'slug' => $slug,
                'category' => $category->name
            ]);
        // }

        return $this->newBatch($request, $course);
    }

    public function createBatch(NewBatchRequest $request, $slug){
        $course = Courses::where('slug', $slug)->first();
        return $this->newBatch($request, $course);
    }

    public function newBatch($request, $course){
        $batch_id = Token::unique('batches');
        $user = $this->user();
        $images = FileHandler::upload($request->file('images'));

        $user = $this->user();

        $short_code = strtolower(Token::text(7, 'batches', 'short_code'));

        $price = Currency::convertUserCurrencyToDefault($request->price);
        $discount_price = $this->parseDiscount($request, $price);

        $batch = Batch::create([
            'unique_id' => $batch_id,
            'course_id' => $course ? $course->unique_id : null,
            'mentor_id' => $user->unique_id,
            'duration' => $request->duration,
            'excerpt' => $request->excerpt,
            'objectives' => $request->objectives,
            'class_link' => $request->class_link,
            'access_link' => $request->access_link,
            'attendees' => $request->attendees,
            'price' => $price,
            'tags' => $request->tags,
            'category' => $request->category ?? $course->category,
            'desc' => $request->desc,
            'video' => $request->video,
            'certificates' => $request->certificates === 'on' ? true : false,
            'images' => $images,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'title' => $request->title,
            'short_code' => $short_code,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'fixed' => $request->fixed,
            'percent' => $request->percent,
            'time_limit' => $request->time_limit,
            'signup_limit' => $request->signup_limit,
            'currency' => $user->currency,
        ]);

        $course->update([
            'total_batches' => $course->total_batches + 1
        ]);

        $user->total_batches += 1;
        $user->save();

        $message = [
            Notifications::parse('image', asset('images/email/kyc-success.png')),
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', 'Congratulations, you have successfully created a new Session on '.env('APP_NAME').' Your session details are as follows.'),
            Notifications::parse('text', "<strong>Course Title:</strong> $course->name."),
            Notifications::parse('text', "<strong>Session Name:</strong> $batch->title."),
            Notifications::parse('text', "<strong>Start Date:</strong> ".Date::parse($batch->startdate)->format('M jS Y, g:i A')."."),
            Notifications::parse('text', "Click the link below to view your Session on the front page"),
            Notifications::parse('action', [
                'link' => env('MAIN_APP_URL')."/$batch->short_code",
                'action' => "Go to Session"
            ]),
            Notifications::parse('text', "Thank you for trusting us to help you create the best for your Students."),
        ];

        $notification = Notifications::builder("Your session has been created successfully!", $message);
        Notifications::send($user, $notification, ['mail', 'database']);

        return Response::redirect("/me/courses/$course->slug/$batch->short_code", 'success', 'Session Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
