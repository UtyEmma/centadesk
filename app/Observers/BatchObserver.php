<?php

namespace App\Observers;

use App\Library\Notifications;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\User;
use App\Notifications\NewCourseAlertNotification;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

class BatchObserver {

    public function created(Batch $batch){
        $category = $batch->category;
        $mentor = User::find($batch->mentor_id);
        $users = User::where('interests', 'like', "%\"{$category}\"%")->get();

        // $enrollments = Enrollment::where('course_id', $batch->course_id)->with('student')->get();

        $users = User::where(function($query) use($category){
            $interest = collect($query->get('interests'));
            return $interest->contains($category);
        })->get();

        $notification = [
            'course' => $batch->course,
            'mentor' => $mentor,
            'batch' => $batch
        ];

        $message = [
            Notifications::parse('text', 'A new Session you might be interested in has been created!. Here are the details:'),
            Notifications::parse('text', "<strong>Course Title:</strong> ".$batch->course->name),
            Notifications::parse('text', "<strong>Session Name:</strong> $batch->title."),
            Notifications::parse('text', "<strong>Start Date:</strong> ".Date::parse($batch->startdate)->format('M jS Y, g:i A')."."),
            Notifications::parse('text', "Click the link below to check it out and join in."),
            Notifications::parse('action', [
                'link' => env('MAIN_APP_URL')."/$batch->short_code",
                'action' => "Go to Session"
            ]),
            Notifications::parse('text', "Happy Learning!"),
        ];

        $notification = Notifications::builder("A new Session is available for you!", $message);
        Notifications::send($users, $notification, ['mail'], true);
    }

    public function updated(Batch $batch) {
        //
    }

    public function deleted(Batch $batch) {
        //
    }

    public function restored(Batch $batch) {
        //
    }


    public function forceDeleted(Batch $batch) {
        //
    }
}
