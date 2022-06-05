<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSignupNotification extends Notification implements ShouldQueue{
    use Queueable;

    private $details;

    public function __construct($details){
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable){
        $details = $this->details;
        $user = $details['user'];

        return (new MailMessage)
                    ->subject("Hi $user->firstname, Welcome to Libraclass")
                    ->view('emails.welcome', [
                        'user' => $user,
                        'profile' => $details['profile'],
                        'link' => route('profile.overview'),
                        'action' => 'My Profile'
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable){
        return [
            'title' => 'Your account has been created. Welcome onboard!',
            'body' => "We are pleased to have you onboard and can't wait to !",
            'link' => route('profile.overview'),
            'action' => 'My Profile',
        ];
    }
}
