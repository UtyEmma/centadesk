<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MentorApplicationSent {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function broadcastOn(){
        return new PrivateChannel('channel-name');
    }
}
