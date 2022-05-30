<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;


    private $request;


    public function __construct($request){
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $request = $this->request;
        return $this->from($request->email, $request->name)
                    ->subject($request->subject)
                    ->view('emails.contact', [
                        'message' => $request->message,
                        'subject' => $request->subject,
                        'name' => $request->name
                    ]);
    }
}
