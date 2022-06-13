<?php

namespace App\Library;

use App\Notifications\GeneralNotification;
use App\Notifications\GeneralQueuedNotification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;

class Notifications {

    static function toArray(string $title, string $link = '', string $action = ''){
        return [
            'title' => $title,
            'link' => $link,
            'action' => $action
        ];
    }

    static function builder($subject, $message = [], $data = []){
        $action = $message['action'] ?? [
            'link' => '',
            'action' => ''
        ];
        return [
            'subject' => $subject,
            'message' => $message,
            'data' => array_merge(self::toArray($subject, $action['link'], $action['action']), $data)
        ];
    }

    static function send($receivers, $data, $channels = ['mail', 'database'], $queue = false){
        try {
            if($queue){
                Notification::send($receivers, new GeneralQueuedNotification($data, $channels));
            }else{
                Notification::send($receivers, new GeneralNotification($data, $channels));
            }
        } catch (\Throwable $th) {}
    }

    static function parse($type, $value){
        return [
            'type' => $type,
            'value' => $value
        ];
    }
}
