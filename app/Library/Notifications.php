<?php

namespace App\Library;

class Notifications {

    static function toArray(string $title, string $body = '', string $link = '', string $action = ''){
        return [
            'title' => $title,
            'body' => $body,
            'link' => $link,
            'action' => $action
        ];
    }

}
