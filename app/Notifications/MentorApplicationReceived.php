<?php

namespace App\Notifications;

use App\Library\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MentorApplicationReceived extends Notification implements ShouldQueue{
    use Queueable;

    private $user;

    public function __construct($user){
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable){
        return (new MailMessage)
                    ->subject('Action Required! New Mentor Application')
                    ->line("A new Mentor Application has been received and awaiting review.")
                    ->line("Please procceed to your Mentor Dashboard to view the User's details and process the request!")
                    ->action('Visit Admin Dashboard', route('admin.mentors.requests'))
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable){
        return Notifications::toArray('New Mentor Application', "A New Mentor Application has been received", route('admin.mentors.requests'), 'View Mentor Requests');
    }
}
