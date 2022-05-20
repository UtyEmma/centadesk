<?php

namespace App\Jobs;

use App\Models\Courses;
use App\Models\User;
use App\Notifications\NewCourseAlertNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class NewCourseAlert implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $batch;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($batch){
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        $course = Courses::find($this->batch->course_id);
        $category = $course->category;
        $mentor = User::find($this->course->mentor_id);

        $users = User::where(function($query) use($category){
            $interest = collect($query->get('interests'));
            return $interest->contains($category);
        })->get();

        $notification = [
            'course' => $course,
            'mentor' => $mentor,
            'batch' => $this->batch
        ];

        Notification::send($users, new NewCourseAlertNotification($notification));
    }
}
