<?php

namespace App\Listeners;

use App\Events\MentorApplicationSent;
use App\Models\Admin;
use App\Notifications\MentorApplicationReceived;
use App\Notifications\NewMentorAccountRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class MentorApplicationCreatedListener{

    public function __construct(){}

    /**
     * Handle the event.
     *
     * @param  \App\Events\MentorApplicationSent  $event
     * @return void
     */
    public function handle(MentorApplicationSent $event){
        $user = $event->user;
        $admins = Admin::all();

        $notification = [
            'subject' => "Your Mentor Signup Request has been sent and is being Reviewed",
            'dashboard' => route('mentor.home')
        ];

        Notification::send($user, new NewMentorAccountRequestNotification($notification));
        Notification::send($admins, new MentorApplicationReceived($user));

    }
}
