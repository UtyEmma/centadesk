<?php

namespace App\Observers;

use App\Models\Batch;
use App\Models\Courses;
use App\Models\User;
use App\Notifications\NewCourseAlertNotification;
use Illuminate\Support\Facades\Notification;

class BatchObserver {

    public function created(Batch $batch){
        // $category = $batch->category;
        // $mentor = User::find($batch->mentor_id);
        // $query = User::query();

        // $query->where('status', true)
        //         ->whereIn('courses.category', "users.interests")
        //         ->with(['course', 'enrollments'])
        //         ->withCount(['course', 'enrollments'])
        //         ->get();

        // $users = User::where(function($query) use($category){
        //     $interest = collect($query->get('interests'));
        //     return $interest->contains($category);
        // })->get();

        // $notification = [
        //     'course' => $batch->course,
        //     'mentor' => $mentor,
        //     'batch' => $this->batch
        // ];

        // Notification::send($users, new NewCourseAlertNotification($notification));
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
